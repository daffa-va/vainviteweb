<main class="page">
    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Order</h1>
            <p class="page-subtitle">
                Daftar semua permintaan pesanan pekerjaan masuk dari client.
            </p>
        </div>
        <div style="display:flex;gap:8px;flex-shrink:0;">
            <button type="button" class="btn-primary" wire:click="openAddModal">
                <i class="fa-solid fa-circle-plus icon-spacing"></i> Tambah Order Baru
            </button>
            <button type="button" class="btn-primary" wire:click="exportCsv" style="background:#22c55e;border-color:#22c55e;color:#000;">
                <i class="fa-solid fa-download icon-spacing"></i> Export CSV
            </button>
        </div>
    </div>

    <div class="filter-bar">
        <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nama atau nomor WA..."
            class="form-input" style="max-width: 300px" />
        <select class="form-input" wire:model.live="status" style="max-width: 180px">
            <option value="all">Semua Status</option>
            <option value="pending">Menunggu</option>
            <option value="progress">Dikerjakan</option>
            <option value="done">Selesai</option>
        </select>
    </div>

    <div class="card">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Detail Tema</th>
                        <th>Harga</th>
                        <th>Deadline</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $item)
                        <tr>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            <td>
                                <strong>{{ $item->client_name }}</strong><br />
                                <small style="color: var(--muted)">{{ $item->client_wa }}</small>
                            </td>
                            <td>
                                @if ($item->theme_category)
                                    <strong>{{ $item->theme_category }}</strong>
                                    @if ($item->theme_name)
                                        <br /><small style="color: var(--muted)">Tema: {{ $item->theme_name }}</small>
                                    @endif
                                @elseif ($item->price)
                                    <strong>{{ $item->price->name }}</strong>
                                @else
                                    <strong style="color: var(--red)">Paket Master Dihapus</strong>
                                @endif
                                @if ($item->has_photo !== null)
                                    <br /><small style="color: var(--amber)">{{ $item->has_photo ? 'Dengan Foto' : 'Tanpa Foto' }}</small>
                                @endif
                                @if ($item->custom_note)
                                    <br /><small style="color: #94a3b8">Catatan: {{ $item->custom_note }}</small>
                                @endif
                                @if ($item->result_link)
                                    <br /><a href="{{ $item->result_link }}" target="_blank" style="color: var(--amber); font-size:0.85rem;">
                                        <i class="fa-solid fa-external-link-alt"></i> Lihat Undangan
                                    </a>
                                @endif
                            </td>
                            <td style="font-weight: 600;">Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
                            <td>
                                @if ($item->deadline)
                                    {{ \Carbon\Carbon::parse($item->deadline)->format('d/m/Y') }}
                                    @php $overdue = now()->gt(\Carbon\Carbon::parse($item->deadline)->endOfDay()) && $item->status !== 'done' @endphp
                                    @if ($overdue)
                                        <br /><small style="color: var(--red)">Terlambat!</small>
                                    @endif
                                @else
                                    <span style="color:var(--muted);font-style:italic;">-</span>
                                @endif
                            </td>
                            <td>

                                @if ($item->status === 'pending')
                                    <span class="badge badge-pending"><i
                                            class="fa-solid fa-hourglass-half icon-spacing"></i> Menunggu</span>
                                @elseif($item->status === 'progress')
                                    <span class="badge badge-progress"><i
                                            class="fa-solid fa-spinner fa-spin icon-spacing"></i> Dikerjakan</span>
                                @else
                                    <span class="badge badge-done"><i class="fa-solid fa-circle-check icon-spacing"></i>
                                        Selesai</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn-sm btn-ghost"
                                        wire:click="openDetail({{ $item->id }})">
                                        <i class="fa-solid fa-eye"></i> Detail
                                    </button>
                                    @if ($item->status !== 'done')
                                    <button type="button" class="btn-sm" style="border-color: var(--green); color: #4ade80;"
                                        wire:click="markDone({{ $item->id }})"
                                        onclick="confirm('Tandai selesai & kirim link undangan ke client via WA?') || event.stopImmediatePropagation()">
                                        <i class="fa-solid fa-circle-check"></i> Done
                                    </button>
                                    @endif
                                    <button type="button" class="btn-sm btn-ghost"
                                        wire:click="openEditModal({{ $item->id }})">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </button>
                                    <button type="button" class="btn-sm btn-danger-ghost"
                                        wire:click="delete({{ $item->id }})"
                                        onclick="confirm('Yakin ingin menghapus data order ini?') || event.stopImmediatePropagation()">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" style="text-align: center; color: var(--muted); padding: 40px;">
                                <div style="margin-bottom: 10px;">
                                    <i class="fa-solid fa-folder-open"
                                        style="font-size: 2rem; color: var(--muted);"></i>
                                </div>
                                <strong>Tidak ada data orderan yang cocok.</strong>
                                <p style="font-size: 0.85rem; margin-top: 4px;">Coba ubah filter status atau kata kunci
                                    kata kunci pencarian Anda.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div style="padding:12px 0;">{{ $orders->links() }}</div>
        </div>
    </div>

    <div class="modal-overlay {{ $isOpen ? 'show' : '' }}" id="orderModal">
        <div class="modal">
            <form wire:submit.prevent="save">
                <div class="modal-header">
                    <h3 class="card-title" id="modalTitle">
                        @if ($isEdit)
                            <i class="fa-solid fa-pen-to-square icon-spacing"></i> Edit Detail Data Order
                        @else
                            <i class="fa-solid fa-circle-plus icon-spacing"></i> Tambah Order Baru
                        @endif
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cName">Nama Lengkap Client *</label>
                        <input type="text" class="form-input" id="cName" wire:model="form.clientName"
                            placeholder="Contoh: Ahmad" required />
                        @error('form.clientName')
                            <small style="color: var(--red);">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="cWa">Nomor WhatsApp *</label>
                        <input type="text" class="form-input" id="cWa" wire:model="form.clientWa"
                            placeholder="Contoh: 0812..." required />
                        @error('form.clientWa')
                            <small style="color: var(--red);">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sId">Kategori Tema *</label>
                        <select class="form-input" id="sId" wire:model="form.themeCategory" required>
                            <option value="">— Pilih Kategori —</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                        @error('form.themeCategory')
                            <small style="color: var(--red);">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tName">Nama Tema</label>
                        <input type="text" class="form-input" id="tName" wire:model="form.themeName"
                            placeholder="Contoh: Rose Gold" />
                    </div>

                    <div class="form-group">
                        <label>Dengan Foto / Tanpa Foto</label>
                        <div style="display:flex; gap:16px; margin-top:6px;">
                            <label style="display:flex; align-items:center; gap:6px; cursor:pointer;">
                                <input type="radio" name="hasPhoto" wire:model.live="form.hasPhoto" value="1" />
                                <span>Dengan Foto — Rp109.000</span>
                            </label>
                            <label style="display:flex; align-items:center; gap:6px; cursor:pointer;">
                                <input type="radio" name="hasPhoto" wire:model.live="form.hasPhoto" value="0" />
                                <span>Tanpa Foto — Rp79.000</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tPrice">Harga Deal Akhir (Rupiah) *</label>
                        <input type="number" class="form-input" id="tPrice" wire:model="form.totalPrice"
                            placeholder="Harga kesepakatan final..." required />
                        @error('form.totalPrice')
                            <small style="color: var(--red);">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="oStatus">Status Progres Kerja *</label>
                        <select class="form-input" id="oStatus" wire:model="form.status" required>
                            <option value="pending">Menunggu (Antrean)</option>
                            <option value="progress">Dikerjakan (On Progress)</option>
                            <option value="done">Selesai (Done)</option>
                        </select>
                        @error('form.status')
                            <small style="color: var(--red);">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="dl">Tenggat Waktu (Deadline)</label>
                        <input type="date" class="form-input" id="dl" wire:model="form.deadline" />
                    </div>

                    <div class="form-group">
                        <label for="cNote">Catatan Spesifikasi Order</label>
                        <textarea class="form-input" id="cNote" wire:model="form.customNote"
                            placeholder="Tulis rincian undangan..." rows="3"></textarea>
                        @error('form.customNote')
                            <small style="color: var(--red);">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="rLink">Link / Pesan Undangan Jadi</label>
                        <textarea class="form-input" id="rLink" wire:model="form.resultLink"
                            placeholder="https://contoh-undangan.vercel.app" rows="3" style="resize:vertical;"></textarea>
                        @error('form.resultLink')
                            <small style="color: var(--red);">{{ $message }}</small>
                        @enderror
                        <small style="color: var(--muted);">Isi link atau teks undangan setelah selesai. Otomatis terkirim ke WA client saat status diubah ke Done.</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-ghost" wire:click="closeModal">Batal</button>
                    <button type="submit" class="btn-primary" id="saveModalBtn">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    {{-- DETAIL MODAL --}}
    <div class="modal-overlay {{ $isOpenDetail ? 'show' : '' }}" id="detailModal">
        <div class="modal" style="max-width: 600px;">
            <div class="modal-header">
                <h3 class="card-title"><i class="fa-solid fa-file-lines icon-spacing"></i> Detail Pesanan</h3>
            </div>
            <div class="modal-body" style="max-height:70vh;overflow-y:auto;">
                @if ($detailOrder)
                    @php $raw = $detailOrder->form_data ? json_decode($detailOrder->form_data, true) : null; $fd = is_array($raw) ? $raw : []; @endphp

                    <div class="detail-section">
                        <h4 style="color:var(--amber);margin-bottom:10px;font-size:0.9rem;">
                            <i class="fa-solid fa-receipt"></i> Informasi Umum
                        </h4>
                        <table style="width:100%;font-size:0.85rem;">
                            <tr><td style="color:var(--muted);width:140px;padding:4px 0;">Pemesan</td><td>{{ $detailOrder->client_name ?? '-' }}</td></tr>
                            <tr><td style="color:var(--muted);">No. WA</td><td>{{ $detailOrder->client_wa ?? '-' }}</td></tr>
                            <tr><td style="color:var(--muted);">Kategori</td><td>{{ $detailOrder->theme_category ?? '-' }}</td></tr>
                            <tr><td style="color:var(--muted);">Tema</td><td>{{ $detailOrder->theme_name ?? '-' }}</td></tr>
                            <tr><td style="color:var(--muted);">Opsi</td><td>{{ $detailOrder->has_photo ? 'Dengan Foto' : 'Tanpa Foto' }}</td></tr>
                            <tr><td style="color:var(--muted);">Harga</td><td>Rp {{ number_format($detailOrder->total_price,0,',','.') }}</td></tr>
                            <tr><td style="color:var(--muted);">Status</td><td><span class="badge badge-{{ $detailOrder->status }}">{{ ucfirst($detailOrder->status) }}</span></td></tr>
                        </table>
                    </div>

                    @if (is_array($fd) && count($fd) > 0)
                        <hr style="border-color:var(--border);margin:16px 0;" />

                        @if (($fd['mempelai_pria_panggilan'] ?? false) || ($fd['mempelai_wanita_panggilan'] ?? false))
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-heart"></i> Data Mempelai</h4>
                            <table style="width:100%;font-size:0.85rem;">
                                @if ($fd['mempelai_pria_panggilan'] ?? false)<tr><td style="color:var(--muted);width:140px;padding:3px 0;">Pria (panggilan)</td><td>{{ $fd['mempelai_pria_panggilan'] ?? '' }}</td></tr>@endif
                                @if ($fd['mempelai_wanita_panggilan'] ?? false)<tr><td style="color:var(--muted);">Wanita (panggilan)</td><td>{{ $fd['mempelai_wanita_panggilan'] ?? '' }}</td></tr>@endif
                                @if ($fd['mempelai_pria_lengkap'] ?? false)<tr><td style="color:var(--muted);">Pria (lengkap)</td><td>{{ $fd['mempelai_pria_lengkap'] ?? '' }}</td></tr>@endif
                                @if ($fd['mempelai_wanita_lengkap'] ?? false)<tr><td style="color:var(--muted);">Wanita (lengkap)</td><td>{{ $fd['mempelai_wanita_lengkap'] ?? '' }}</td></tr>@endif
                                @if ($fd['ortu_pria'] ?? false)<tr><td style="color:var(--muted);">Orang Tua Pria</td><td>{{ $fd['ortu_pria'] ?? '' }}</td></tr>@endif
                                @if ($fd['ortu_wanita'] ?? false)<tr><td style="color:var(--muted);">Orang Tua Wanita</td><td>{{ $fd['ortu_wanita'] ?? '' }}</td></tr>@endif
                            </table>
                        </div>
                        @endif

                        @if (isset($fd['acara']) && is_array($fd['acara']) && count($fd['acara']) > 0)
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-calendar-days"></i> Data Acara</h4>
                            @foreach ($fd['acara'] as $ac)
                                <div style="background:rgba(255,255,255,0.02);border:1px solid var(--border);border-radius:8px;padding:12px;margin-bottom:8px;">
                                    <strong style="color:#f59e0b;font-size:0.88rem;">{{ $ac['nama'] ?? '-' }}</strong>
                                    <table style="width:100%;font-size:0.82rem;margin-top:6px;">
                                        @if ($ac['tanggal'] ?? false)<tr><td style="color:var(--muted);width:100px;padding:2px 0;">Tanggal</td><td>{{ \Carbon\Carbon::parse($ac['tanggal'])->translatedFormat('d F Y') }}</td></tr>@endif
                                        @if ($ac['waktu'] ?? false)<tr><td style="color:var(--muted);">Waktu</td><td>{{ $ac['waktu'] ?? '' }}{{ ($ac['waktu_selesai'] ?? false) ? ' - '.$ac['waktu_selesai'] : '' }}</td></tr>@endif
                                        @if ($ac['zona_waktu'] ?? false)<tr><td style="color:var(--muted);">Zona</td><td>{{ $ac['zona_waktu'] ?? '' }}</td></tr>@endif
                                        @if ($ac['lokasi'] ?? false)<tr><td style="color:var(--muted);">Lokasi</td><td>{{ $ac['lokasi'] ?? '' }}</td></tr>@endif
                                        @if ($ac['alamat'] ?? false)<tr><td style="color:var(--muted);">Alamat</td><td>{{ $ac['alamat'] ?? '' }}</td></tr>@endif
                                        @if ($ac['maps'] ?? false)<tr><td style="color:var(--muted);">Maps</td><td><a href="{{ $ac['maps'] }}" target="_blank" style="color:var(--amber);">Lihat</a></td></tr>@endif
                                    </table>
                                </div>
                            @endforeach
                        </div>
                        @endif

                        @if ((isset($fd['love_story']) && is_array($fd['love_story']) && count($fd['love_story']) > 0) || ($fd['love_story_motto'] ?? false) || ($fd['love_story_tanggal'] ?? false) || ($fd['love_story_tunangan'] ?? false))
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-book-heart"></i> Love Story</h4>
                            <table style="width:100%;font-size:0.85rem;">
                                @if (isset($fd['love_story']) && is_array($fd['love_story']))
                                    @foreach ($fd['love_story'] as $ls)
                                        <tr><td style="color:var(--muted);width:140px;padding:3px 0;vertical-align:top;">Cerita {{ $loop->iteration }}</td><td>{{ $ls }}</td></tr>
                                    @endforeach
                                @endif
                                @if ($fd['love_story_tanggal'] ?? false)<tr><td style="color:var(--muted);">Bertemu</td><td>{{ \Carbon\Carbon::parse($fd['love_story_tanggal'])->translatedFormat('d F Y') }}</td></tr>@endif
                                @if ($fd['love_story_tunangan'] ?? false)<tr><td style="color:var(--muted);">Tunangan</td><td>{{ \Carbon\Carbon::parse($fd['love_story_tunangan'])->translatedFormat('d F Y') }}</td></tr>@endif
                                @if ($fd['love_story_motto'] ?? false)<tr><td style="color:var(--muted);">Motto</td><td><em>{{ $fd['love_story_motto'] ?? '' }}</em></td></tr>@endif
                            </table>
                        </div>
                        @endif

                        @if (($fd['kado_digital_bank'] ?? false) || ($fd['kado_digital_norek'] ?? false) || (isset($fd['kado_digital']) && is_array($fd['kado_digital']) && count($fd['kado_digital']) > 0))
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-gift"></i> Kado Digital</h4>
                            @if (isset($fd['kado_digital']) && is_array($fd['kado_digital']) && count($fd['kado_digital']) > 0)
                                @foreach ($fd['kado_digital'] as $kd)
                                <div style="background:rgba(255,255,255,0.02);border:1px solid var(--border);border-radius:8px;padding:12px;margin-bottom:8px;">
                                    <strong style="color:#f59e0b;font-size:0.85rem;">Rekening {{ $loop->iteration }}</strong>
                                    <table style="width:100%;font-size:0.82rem;margin-top:6px;">
                                        @if ($kd['bank'] ?? false)<tr><td style="color:var(--muted);width:100px;padding:2px 0;">Bank</td><td>{{ $kd['bank'] ?? '' }}</td></tr>@endif
                                        @if ($kd['an'] ?? false)<tr><td style="color:var(--muted);">A/N</td><td>{{ $kd['an'] ?? '' }}</td></tr>@endif
                                        @if ($kd['norek'] ?? false)<tr><td style="color:var(--muted);">No. Rek</td><td>{{ $kd['norek'] ?? '' }}</td></tr>@endif
                                    </table>
                                </div>
                                @endforeach
                            @else
                            <table style="width:100%;font-size:0.85rem;">
                                @if ($fd['kado_digital_bank'] ?? false)<tr><td style="color:var(--muted);width:140px;padding:3px 0;">Bank</td><td>{{ $fd['kado_digital_bank'] ?? '' }}</td></tr>@endif
                                @if ($fd['kado_digital_an'] ?? false)<tr><td style="color:var(--muted);">A/N</td><td>{{ $fd['kado_digital_an'] ?? '' }}</td></tr>@endif
                                @if ($fd['kado_digital_norek'] ?? false)<tr><td style="color:var(--muted);">No. Rek</td><td>{{ $fd['kado_digital_norek'] ?? '' }}</td></tr>@endif
                            </table>
                            @endif
                        </div>
                        @endif

                        @if (($fd['kado_fisik_alamat'] ?? false) || ($fd['kado_fisik_nama'] ?? false) || ($fd['kado_fisik_wa'] ?? false))
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-box"></i> Kado Fisik</h4>
                            <table style="width:100%;font-size:0.85rem;">
                                @if ($fd['kado_fisik_nama'] ?? false)<tr><td style="color:var(--muted);width:140px;padding:3px 0;">Penerima</td><td>{{ $fd['kado_fisik_nama'] ?? '' }}</td></tr>@endif
                                @if ($fd['kado_fisik_wa'] ?? false)<tr><td style="color:var(--muted);">WA</td><td>{{ $fd['kado_fisik_wa'] ?? '' }}</td></tr>@endif
                                @if ($fd['kado_fisik_alamat'] ?? false)<tr><td style="color:var(--muted);vertical-align:top;">Alamat</td><td>{{ $fd['kado_fisik_alamat'] ?? '' }}</td></tr>@endif
                            </table>
                        </div>
                        @endif

                        @if (($fd['backsound_link'] ?? false) || ($fd['backsound_judul'] ?? false))
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-music"></i> Backsound & Live</h4>
                            <table style="width:100%;font-size:0.85rem;">
                                @if ($fd['backsound_judul'] ?? false)<tr><td style="color:var(--muted);width:140px;padding:3px 0;">Lagu</td><td>{{ $fd['backsound_judul'] ?? '' }}</td></tr>@endif
                                @if ($fd['backsound_link'] ?? false)<tr><td style="color:var(--muted);">Link</td><td><a href="{{ $fd['backsound_link'] ?? '#' }}" target="_blank" style="color:var(--amber);">Buka</a></td></tr>@endif
                                @if (($fd['backsound_live'] ?? false) !== false)<tr><td style="color:var(--muted);">Live</td><td>{{ ($fd['backsound_live'] ?? '') == '1' ? 'Ya' : 'Tidak' }}</td></tr>@endif
                            </table>
                        </div>
                        @endif

                        @if ($fd['turut_mengundang'] ?? false)
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-people"></i> Turut Mengundang</h4>
                            <div style="font-size:0.85rem;white-space:pre-line;">{{ $fd['turut_mengundang'] ?? '' }}</div>
                        </div>
                        @endif

                        @if (isset($fd['foto']) && is_array($fd['foto']) && count($fd['foto']) > 0)
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-images"></i> Foto</h4>
                            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                                @foreach ($fd['foto'] as $f)
                                <div style="text-align:center;">
                                    <img src="{{ asset('storage/'.$f) }}" style="max-width:120px;max-height:120px;border-radius:8px;border:1px solid var(--border);object-fit:cover;" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22%23666%22><path d=%22M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z%22/></svg>'" />
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    @endif

                    @if ($detailOrder->theme_link)
                        <hr style="border-color:var(--border);margin:16px 0;" />
                        <div style="text-align:center;">
                            <a href="{{ $detailOrder->theme_link }}" target="_blank" class="btn-sm btn-ghost"><i class="fa-solid fa-eye"></i> Lihat Preview Tema</a>
                        </div>
                    @endif
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-ghost" wire:click="closeModal">Tutup</button>
            </div>
        </div>
    </div>
</main>
