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
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($item->created_at->format('d/m/Y')); ?></td>
                            <td>
                                <strong><?php echo e($item->client_name); ?></strong><br />
                                <small style="color: var(--muted)"><?php echo e($item->client_wa); ?></small>
                            </td>
                            <td>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->theme_category): ?>
                                    <strong><?php echo e($item->theme_category); ?></strong>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->theme_name): ?>
                                        <br /><small style="color: var(--muted)">Tema: <?php echo e($item->theme_name); ?></small>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php elseif($item->price): ?>
                                    <strong><?php echo e($item->price->name); ?></strong>
                                <?php else: ?>
                                    <strong style="color: var(--red)">Paket Master Dihapus</strong>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->has_photo !== null): ?>
                                    <br /><small style="color: var(--amber)"><?php echo e($item->has_photo ? 'Dengan Foto' : 'Tanpa Foto'); ?></small>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->custom_note): ?>
                                    <br /><small style="color: #94a3b8">Catatan: <?php echo e($item->custom_note); ?></small>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->result_link): ?>
                                    <br /><a href="<?php echo e($item->result_link); ?>" target="_blank" style="color: var(--amber); font-size:0.85rem;">
                                        <i class="fa-solid fa-external-link-alt"></i> Lihat Undangan
                                    </a>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td style="font-weight: 600;">Rp <?php echo e(number_format($item->total_price, 0, ',', '.')); ?></td>
                            <td>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->deadline): ?>
                                    <?php echo e(\Carbon\Carbon::parse($item->deadline)->format('d/m/Y')); ?>

                                    <?php $overdue = now()->gt(\Carbon\Carbon::parse($item->deadline)->endOfDay()) && $item->status !== 'done' ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($overdue): ?>
                                        <br /><small style="color: var(--red)">Terlambat!</small>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php else: ?>
                                    <span style="color:var(--muted);font-style:italic;">-</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td>

                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->status === 'pending'): ?>
                                    <span class="badge badge-pending"><i
                                            class="fa-solid fa-hourglass-half icon-spacing"></i> Menunggu</span>
                                <?php elseif($item->status === 'progress'): ?>
                                    <span class="badge badge-progress"><i
                                            class="fa-solid fa-spinner fa-spin icon-spacing"></i> Dikerjakan</span>
                                <?php else: ?>
                                    <span class="badge badge-done"><i class="fa-solid fa-circle-check icon-spacing"></i>
                                        Selesai</span>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn-sm btn-ghost"
                                        wire:click="openDetail(<?php echo e($item->id); ?>)">
                                        <i class="fa-solid fa-eye"></i> Detail
                                    </button>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($item->status !== 'done'): ?>
                                    <button type="button" class="btn-sm" style="border-color: var(--green); color: #4ade80;"
                                        wire:click="markDone(<?php echo e($item->id); ?>)"
                                        onclick="confirm('Tandai selesai & kirim link undangan ke client via WA?') || event.stopImmediatePropagation()">
                                        <i class="fa-solid fa-circle-check"></i> Done
                                    </button>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <button type="button" class="btn-sm btn-ghost"
                                        wire:click="openEditModal(<?php echo e($item->id); ?>)">
                                        <i class="fa-solid fa-pen-to-square"></i> Edit
                                    </button>
                                    <button type="button" class="btn-sm btn-danger-ghost"
                                        wire:click="delete(<?php echo e($item->id); ?>)"
                                        onclick="confirm('Yakin ingin menghapus data order ini?') || event.stopImmediatePropagation()">
                                        <i class="fa-solid fa-trash-can"></i> Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
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
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
            <div style="padding:12px 0;"><?php echo e($orders->links()); ?></div>
        </div>
    </div>

    <div class="modal-overlay <?php echo e($isOpen ? 'show' : ''); ?>" id="orderModal">
        <div class="modal">
            <form wire:submit.prevent="save">
                <div class="modal-header">
                    <h3 class="card-title" id="modalTitle">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($isEdit): ?>
                            <i class="fa-solid fa-pen-to-square icon-spacing"></i> Edit Detail Data Order
                        <?php else: ?>
                            <i class="fa-solid fa-circle-plus icon-spacing"></i> Tambah Order Baru
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="cName">Nama Lengkap Client *</label>
                        <input type="text" class="form-input" id="cName" wire:model="form.clientName"
                            placeholder="Contoh: Ahmad" required />
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.clientName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style="color: var(--red);"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="cWa">Nomor WhatsApp *</label>
                        <input type="text" class="form-input" id="cWa" wire:model="form.clientWa"
                            placeholder="Contoh: 0812..." required />
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.clientWa'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style="color: var(--red);"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="sId">Kategori Tema *</label>
                        <select class="form-input" id="sId" wire:model="form.themeCategory" required>
                            <option value="">— Pilih Kategori —</option>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat); ?>"><?php echo e($cat); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </select>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.themeCategory'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style="color: var(--red);"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
                                <span>Dengan Foto — Rp<?php echo e(number_format($priceWith, 0, ',', '.')); ?></span>
                            </label>
                            <label style="display:flex; align-items:center; gap:6px; cursor:pointer;">
                                <input type="radio" name="hasPhoto" wire:model.live="form.hasPhoto" value="0" />
                                <span>Tanpa Foto — Rp<?php echo e(number_format($priceWithout, 0, ',', '.')); ?></span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="tPrice">Harga Deal Akhir (Rupiah) *</label>
                        <input type="number" class="form-input" id="tPrice" wire:model="form.totalPrice"
                            placeholder="Harga kesepakatan final..." required />
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.totalPrice'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style="color: var(--red);"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="oStatus">Status Progres Kerja *</label>
                        <select class="form-input" id="oStatus" wire:model="form.status" required>
                            <option value="pending">Menunggu (Antrean)</option>
                            <option value="progress">Dikerjakan (On Progress)</option>
                            <option value="done">Selesai (Done)</option>
                        </select>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style="color: var(--red);"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="dl">Tenggat Waktu (Deadline)</label>
                        <input type="date" class="form-input" id="dl" wire:model="form.deadline" />
                    </div>

                    <div class="form-group">
                        <label for="cNote">Catatan Spesifikasi Order</label>
                        <textarea class="form-input" id="cNote" wire:model="form.customNote"
                            placeholder="Tulis rincian undangan..." rows="3"></textarea>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.customNote'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style="color: var(--red);"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="rLink">Link / Pesan Undangan Jadi</label>
                        <textarea class="form-input" id="rLink" wire:model="form.resultLink"
                            placeholder="https://contoh-undangan.vercel.app" rows="3" style="resize:vertical;"></textarea>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__errorArgs = ['form.resultLink'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small style="color: var(--red);"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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

    
    <div class="modal-overlay <?php echo e($isOpenDetail ? 'show' : ''); ?>" id="detailModal">
        <div class="modal" style="max-width: 600px;">
            <div class="modal-header">
                <h3 class="card-title"><i class="fa-solid fa-file-lines icon-spacing"></i> Detail Pesanan</h3>
            </div>
            <div class="modal-body" style="max-height:70vh;overflow-y:auto;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($detailOrder): ?>
                    <?php $raw = $detailOrder->form_data ? json_decode($detailOrder->form_data, true) : null; $fd = is_array($raw) ? $raw : []; ?>

                    <div class="detail-section">
                        <h4 style="color:var(--amber);margin-bottom:10px;font-size:0.9rem;">
                            <i class="fa-solid fa-receipt"></i> Informasi Umum
                        </h4>
                        <table style="width:100%;font-size:0.85rem;">
                            <tr><td style="color:var(--muted);width:140px;padding:4px 0;">Pemesan</td><td><?php echo e($detailOrder->client_name ?? '-'); ?></td></tr>
                            <tr><td style="color:var(--muted);">No. WA</td><td><?php echo e($detailOrder->client_wa ?? '-'); ?></td></tr>
                            <tr><td style="color:var(--muted);">Kategori</td><td><?php echo e($detailOrder->theme_category ?? '-'); ?></td></tr>
                            <tr><td style="color:var(--muted);">Tema</td><td><?php echo e($detailOrder->theme_name ?? '-'); ?></td></tr>
                            <tr><td style="color:var(--muted);">Opsi</td><td><?php echo e($detailOrder->has_photo ? 'Dengan Foto' : 'Tanpa Foto'); ?></td></tr>
                            <tr><td style="color:var(--muted);">Harga</td><td>Rp <?php echo e(number_format($detailOrder->total_price,0,',','.')); ?></td></tr>
                            <tr><td style="color:var(--muted);">Status</td><td><span class="badge badge-<?php echo e($detailOrder->status); ?>"><?php echo e(ucfirst($detailOrder->status)); ?></span></td></tr>
                        </table>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_array($fd) && count($fd) > 0): ?>
                        <hr style="border-color:var(--border);margin:16px 0;" />

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($fd['mempelai_pria_panggilan'] ?? false) || ($fd['mempelai_wanita_panggilan'] ?? false)): ?>
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-heart"></i> Data Mempelai</h4>
                            <table style="width:100%;font-size:0.85rem;">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['mempelai_pria_panggilan'] ?? false): ?><tr><td style="color:var(--muted);width:140px;padding:3px 0;">Pria (panggilan)</td><td><?php echo e($fd['mempelai_pria_panggilan'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['mempelai_wanita_panggilan'] ?? false): ?><tr><td style="color:var(--muted);">Wanita (panggilan)</td><td><?php echo e($fd['mempelai_wanita_panggilan'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['mempelai_pria_lengkap'] ?? false): ?><tr><td style="color:var(--muted);">Pria (lengkap)</td><td><?php echo e($fd['mempelai_pria_lengkap'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['mempelai_wanita_lengkap'] ?? false): ?><tr><td style="color:var(--muted);">Wanita (lengkap)</td><td><?php echo e($fd['mempelai_wanita_lengkap'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['ortu_pria'] ?? false): ?><tr><td style="color:var(--muted);">Orang Tua Pria</td><td><?php echo e($fd['ortu_pria'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['ortu_wanita'] ?? false): ?><tr><td style="color:var(--muted);">Orang Tua Wanita</td><td><?php echo e($fd['ortu_wanita'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </table>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fd['acara']) && is_array($fd['acara']) && count($fd['acara']) > 0): ?>
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-calendar-days"></i> Data Acara</h4>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $fd['acara']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div style="background:rgba(255,255,255,0.02);border:1px solid var(--border);border-radius:8px;padding:12px;margin-bottom:8px;">
                                    <strong style="color:#f59e0b;font-size:0.88rem;"><?php echo e($ac['nama'] ?? '-'); ?></strong>
                                    <table style="width:100%;font-size:0.82rem;margin-top:6px;">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['tanggal'] ?? false): ?><tr><td style="color:var(--muted);width:100px;padding:2px 0;">Tanggal</td><td><?php echo e(\Carbon\Carbon::parse($ac['tanggal'])->translatedFormat('d F Y')); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['waktu'] ?? false): ?><tr><td style="color:var(--muted);">Waktu</td><td><?php echo e($ac['waktu'] ?? ''); ?><?php echo e(($ac['waktu_selesai'] ?? false) ? ' - '.$ac['waktu_selesai'] : ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['zona_waktu'] ?? false): ?><tr><td style="color:var(--muted);">Zona</td><td><?php echo e($ac['zona_waktu'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['lokasi'] ?? false): ?><tr><td style="color:var(--muted);">Lokasi</td><td><?php echo e($ac['lokasi'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['alamat'] ?? false): ?><tr><td style="color:var(--muted);">Alamat</td><td><?php echo e($ac['alamat'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['maps'] ?? false): ?><tr><td style="color:var(--muted);">Maps</td><td><a href="<?php echo e($ac['maps']); ?>" target="_blank" style="color:var(--amber);">Lihat</a></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </table>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if((isset($fd['love_story']) && is_array($fd['love_story']) && count($fd['love_story']) > 0) || ($fd['love_story_motto'] ?? false) || ($fd['love_story_tanggal'] ?? false) || ($fd['love_story_tunangan'] ?? false)): ?>
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-book-heart"></i> Love Story</h4>
                            <table style="width:100%;font-size:0.85rem;">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fd['love_story']) && is_array($fd['love_story'])): ?>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $fd['love_story']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ls): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr><td style="color:var(--muted);width:140px;padding:3px 0;vertical-align:top;">Cerita <?php echo e($loop->iteration); ?></td><td><?php echo e($ls); ?></td></tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['love_story_tanggal'] ?? false): ?><tr><td style="color:var(--muted);">Bertemu</td><td><?php echo e(\Carbon\Carbon::parse($fd['love_story_tanggal'])->translatedFormat('d F Y')); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['love_story_tunangan'] ?? false): ?><tr><td style="color:var(--muted);">Tunangan</td><td><?php echo e(\Carbon\Carbon::parse($fd['love_story_tunangan'])->translatedFormat('d F Y')); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['love_story_motto'] ?? false): ?><tr><td style="color:var(--muted);">Motto</td><td><em><?php echo e($fd['love_story_motto'] ?? ''); ?></em></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </table>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($fd['kado_digital_bank'] ?? false) || ($fd['kado_digital_norek'] ?? false) || (isset($fd['kado_digital']) && is_array($fd['kado_digital']) && count($fd['kado_digital']) > 0)): ?>
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-gift"></i> Kado Digital</h4>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fd['kado_digital']) && is_array($fd['kado_digital']) && count($fd['kado_digital']) > 0): ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $fd['kado_digital']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $kd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div style="background:rgba(255,255,255,0.02);border:1px solid var(--border);border-radius:8px;padding:12px;margin-bottom:8px;">
                                    <strong style="color:#f59e0b;font-size:0.85rem;">Rekening <?php echo e($loop->iteration); ?></strong>
                                    <table style="width:100%;font-size:0.82rem;margin-top:6px;">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kd['bank'] ?? false): ?><tr><td style="color:var(--muted);width:100px;padding:2px 0;">Bank</td><td><?php echo e($kd['bank'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kd['an'] ?? false): ?><tr><td style="color:var(--muted);">A/N</td><td><?php echo e($kd['an'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($kd['norek'] ?? false): ?><tr><td style="color:var(--muted);">No. Rek</td><td><?php echo e($kd['norek'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    </table>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <?php else: ?>
                            <table style="width:100%;font-size:0.85rem;">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['kado_digital_bank'] ?? false): ?><tr><td style="color:var(--muted);width:140px;padding:3px 0;">Bank</td><td><?php echo e($fd['kado_digital_bank'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['kado_digital_an'] ?? false): ?><tr><td style="color:var(--muted);">A/N</td><td><?php echo e($fd['kado_digital_an'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['kado_digital_norek'] ?? false): ?><tr><td style="color:var(--muted);">No. Rek</td><td><?php echo e($fd['kado_digital_norek'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </table>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($fd['kado_fisik_alamat'] ?? false) || ($fd['kado_fisik_nama'] ?? false) || ($fd['kado_fisik_wa'] ?? false)): ?>
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-box"></i> Kado Fisik</h4>
                            <table style="width:100%;font-size:0.85rem;">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['kado_fisik_nama'] ?? false): ?><tr><td style="color:var(--muted);width:140px;padding:3px 0;">Penerima</td><td><?php echo e($fd['kado_fisik_nama'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['kado_fisik_wa'] ?? false): ?><tr><td style="color:var(--muted);">WA</td><td><?php echo e($fd['kado_fisik_wa'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['kado_fisik_alamat'] ?? false): ?><tr><td style="color:var(--muted);vertical-align:top;">Alamat</td><td><?php echo e($fd['kado_fisik_alamat'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </table>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($fd['backsound_link'] ?? false) || ($fd['backsound_judul'] ?? false)): ?>
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-music"></i> Backsound & Live</h4>
                            <table style="width:100%;font-size:0.85rem;">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['backsound_judul'] ?? false): ?><tr><td style="color:var(--muted);width:140px;padding:3px 0;">Lagu</td><td><?php echo e($fd['backsound_judul'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['backsound_link'] ?? false): ?><tr><td style="color:var(--muted);">Link</td><td><a href="<?php echo e($fd['backsound_link'] ?? '#'); ?>" target="_blank" style="color:var(--amber);">Buka</a></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($fd['backsound_live'] ?? false) !== false): ?><tr><td style="color:var(--muted);">Live</td><td><?php echo e(($fd['backsound_live'] ?? '') == '1' ? 'Ya' : 'Tidak'); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </table>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['turut_mengundang'] ?? false): ?>
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-people"></i> Turut Mengundang</h4>
                            <div style="font-size:0.85rem;white-space:pre-line;"><?php echo e($fd['turut_mengundang'] ?? ''); ?></div>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fd['foto']) && is_array($fd['foto']) && count($fd['foto']) > 0): ?>
                        <div style="margin-bottom:14px;">
                            <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;"><i class="fa-solid fa-images"></i> Foto</h4>
                            <div style="display:flex;gap:10px;flex-wrap:wrap;">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $fd['foto']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div style="text-align:center;">
                                    <img src="<?php echo e(asset('storage/'.$f)); ?>" style="max-width:120px;max-height:120px;border-radius:8px;border:1px solid var(--border);object-fit:cover;" onerror="this.src='data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 24 24%22 fill=%22%23666%22><path d=%22M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z%22/></svg>'" />
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($detailOrder->theme_link): ?>
                        <hr style="border-color:var(--border);margin:16px 0;" />
                        <div style="text-align:center;">
                            <a href="<?php echo e($detailOrder->theme_link); ?>" target="_blank" class="btn-sm btn-ghost"><i class="fa-solid fa-eye"></i> Lihat Preview Tema</a>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn-ghost" wire:click="closeModal">Tutup</button>
            </div>
        </div>
    </div>
</main>
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\livewire\admin\kelola-order.blade.php ENDPATH**/ ?>