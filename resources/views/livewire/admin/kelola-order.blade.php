<main class="page">
    <div class="page-header">
        <div>
            <h1 class="page-title">Manajemen Order</h1>
            <p class="page-subtitle">
                Daftar semua permintaan pesanan pekerjaan masuk dari client.
            </p>
        </div>
        <button type="button" class="btn-primary" wire:click="openAddModal">
            <i class="fa-solid fa-circle-plus icon-spacing"></i> Tambah Order Baru
        </button>
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
                        <th>Detail Layanan</th>
                        <th>Harga</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                {{-- @dd($orders) --}}
                <tbody>
                    @forelse($orders as $item)
                        <tr>
                            <td>{{ $item->created_at->format('d/m/Y') }}</td>
                            <td>
                                <strong>{{ $item->client_name }}</strong><br />
                                <small style="color: var(--muted)">{{ $item->client_wa }}</small>
                            </td>
                            <td>
                                @if ($item->price)
                                    <strong>{{ $item->price->name }}</strong>
                                    {{-- <small style="color: var(--blue)">({{ $item->price->category }})</small> --}}
                                @else
                                    <strong style="color: var(--red)">Paket Master Dihapus</strong>
                                @endif
                                @if ($item->custom_note)
                                    <br /><small style="color: #94a3b8">Catatan: {{ $item->custom_note }}</small>
                                @endif
                            </td>
                            <td style="font-weight: 600;">Rp {{ number_format($item->total_price, 0, ',', '.') }}</td>
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
                            <td colspan="6" style="text-align: center; color: var(--muted); padding: 40px;">
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
                        <label for="sId">Jenis Layanan Paket Master *</label>
                        <select class="form-input" id="sId" wire:model.live="form.priceId" required>
                            @foreach ($services as $srv)
                                <option value="{{ $srv->id }}">[{{ $srv->category }}] {{ $srv->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('form.priceId')
                            <small style="color: var(--red);">{{ $message }}</small>
                        @enderror
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
                        <label for="cNote">Catatan Spesifikasi Order</label>
                        <textarea class="form-input" id="cNote" wire:model="form.customNote"
                            placeholder="Tulis rincian pengerjaan tugas/spanduk..." rows="3"></textarea>
                        @error('form.customNote')
                            <small style="color: var(--red);">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-ghost" wire:click="closeModal">Batal</button>
                    <button type="submit" class="btn-primary" id="saveModalBtn">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>
</main>
