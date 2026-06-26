  <main class="page active">
      <div class="page-header">
          <div>
              <h1 class="page-title">Order Masuk (Antrean)</h1>
              <p class="page-subtitle">
                  Daftar orderan otomatis dari halaman publik yang memerlukan
                  verifikasi kesepakatan.
              </p>
          </div>
      </div>

      <div class="filter-bar">
          <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari nama, WA, atau tema..."
              class="form-input" style="max-width: 300px" />
      </div>

      <div class="card">
          <div class="table-wrapper">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Tanggal</th>
                          <th>Nama Client / Minat Tema</th>
                          <th>No. WhatsApp</th>
                          <th>Paket Pilihan</th>
                          <th>Status</th>
                          <th>Aksi Verifikasi</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                          <tr>
                              <td><?php echo e($order->created_at->format('d/m/Y')); ?></td>
                              <td>
                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->client_name): ?>
                                      <strong><?php echo e($order->client_name); ?></strong>
                                  <?php elseif($order->theme_name): ?>
                                      <strong>Minat: <?php echo e($order->theme_name); ?></strong>
                                      <span class="badge badge-pending" style="font-size:0.7rem;padding:1px 6px;">Dari Katalog</span>
                                  <?php else: ?>
                                      <span class="badge badge-pending">Anonim</span>
                                  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                              </td>
                              <td>
                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->client_wa): ?>
                                      <?php echo e($order->client_wa); ?>

                                  <?php else: ?>
                                      <span style="color:var(--muted);font-style:italic;">-</span>
                                  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                              </td>
                              <td>
                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->price): ?>
                                      <span class="badge badge-progress"><i
                                              class="fa-solid <?php echo e($order->price->icon); ?> icon-spacing"></i>
                                          <?php echo e($order->price->category); ?></span>
                                  <?php elseif($order->theme_category): ?>
                                      <span class="badge badge-progress"><i
                                              class="fa-solid fa-image icon-spacing"></i>
                                          <?php echo e($order->theme_category); ?></span>
                                  <?php else: ?>
                                      <span class="badge badge-cancelled">Paket Dihapus</span>
                                  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                              </td>
                              <td>
                                  <span class="badge badge-pending"><i
                                          class="fa-solid fa-hourglass-half icon-spacing"></i> Menunggu</span>
                              </td>
                              <td>
                                  <div class="btn-group">
                                      <button type="button" class="btn-sm btn-ghost"
                                          wire:click="openDetail(<?php echo e($order->id); ?>)">
                                          <i class="fa-solid fa-eye"></i> Detail
                                      </button>
                                      <button type="button" class="btn-sm btn-ghost"
                                          wire:click="openAcceptModal(<?php echo e($order->id); ?>)"
                                          style="border-color: var(--green); color: #4ade80">
                                          <i class="fa-solid fa-circle-check"></i> Accept
                                      </button>
                                      <button type="button" class="btn-sm btn-danger-ghost"
                                          wire:click="openCancelModal(<?php echo e($order->id); ?>)">
                                          <i class="fa-solid fa-circle-xmark"></i> Cancel
                                      </button>
                                  </div>
                              </td>
                          </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                              <td colspan="6" style="text-align: center; color: var(--muted); padding: 40px;">
                                  <div style="margin-bottom: 10px;">
                                      <i class="fa-solid fa-bell-slashed"
                                          style="font-size: 2rem; color: var(--muted);"></i>
                                  </div>
                                  <strong>Kotak antrean order masuk kosong.</strong>
                                  <p style="font-size: 0.85rem; margin-top: 4px;">Belum ada pelanggan baru yang melakukan
                                      pemesanan via landing page publik.</p>
                              </td>
                          </tr>
                      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                  </tbody>
              </table>
              <div style="padding:12px 0;"><?php echo e($orders->links()); ?></div>
          </div>
      </div>

      <div class="modal-overlay <?php echo e($isOpenCancel ? 'show' : ''); ?>" id="cancelConfirmModal">
          <div class="modal" style="max-width: 400px;">
              <div class="modal-header">
                  <h3 class="card-title" style="color: var(--red);"><i
                          class="fa-solid fa-triangle-exclamation icon-spacing"></i> Batalkan Order</h3>
              </div>
              <div class="modal-body">
                  <p>Apakah Anda yakin ingin membatalkan dan menghapus antrean pesanan dari
                      <strong><?php echo e($cancelTargetName); ?></strong>?
                  </p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn-ghost" wire:click="closeModal">Kembali</button>
                  <button type="button" class="btn-primary" wire:click="confirmCancel"
                      style="background: var(--red); color: white">
                      Ya, Hapus Antrean
                  </button>
              </div>
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
                          <table class="detail-table" style="width:100%;font-size:0.85rem;">
                              <tr><td style="color:var(--muted);width:140px;padding:4px 0;">Pemesan</td><td><?php echo e($detailOrder->client_name ?? '-'); ?></td></tr>
                              <tr><td style="color:var(--muted);">No. WA</td><td><?php echo e($detailOrder->client_wa ?? '-'); ?></td></tr>
                              <tr><td style="color:var(--muted);">Kategori</td><td><?php echo e($detailOrder->theme_category ?? '-'); ?></td></tr>
                              <tr><td style="color:var(--muted);">Tema</td><td><?php echo e($detailOrder->theme_name ?? '-'); ?></td></tr>
                              <tr><td style="color:var(--muted);">Opsi</td><td><?php echo e($detailOrder->has_photo ? 'Dengan Foto' : 'Tanpa Foto'); ?></td></tr>
                              <tr><td style="color:var(--muted);">Harga</td><td>Rp <?php echo e(number_format($detailOrder->total_price,0,',','.')); ?></td></tr>
                              <tr><td style="color:var(--muted);">Status</td><td><span class="badge badge-pending"><?php echo e(ucfirst($detailOrder->status)); ?></span></td></tr>
                          </table>
                      </div>

                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(is_array($fd) && count($fd) > 0): ?>
                          <hr style="border-color:var(--border);margin:16px 0;" />

                          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($fd['mempelai_pria_panggilan'] ?? false) || ($fd['mempelai_wanita_panggilan'] ?? false)): ?>
                          <div class="detail-section" style="margin-bottom:14px;">
                              <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;">
                                  <i class="fa-solid fa-heart"></i> Data Mempelai
                              </h4>
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
                          <div class="detail-section" style="margin-bottom:14px;">
                              <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;">
                                  <i class="fa-solid fa-calendar-days"></i> Data Acara
                              </h4>
                              <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $fd['acara']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ac): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <div style="background:rgba(255,255,255,0.02);border:1px solid var(--border);border-radius:8px;padding:12px;margin-bottom:8px;">
                                      <strong style="color:#f59e0b;font-size:0.88rem;"><?php echo e($ac['nama'] ?? '-'); ?></strong>
                                      <table style="width:100%;font-size:0.82rem;margin-top:6px;">
                                          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['tanggal'] ?? false): ?><tr><td style="color:var(--muted);width:100px;padding:2px 0;">Tanggal</td><td><?php echo e(\Carbon\Carbon::parse($ac['tanggal'])->translatedFormat('d F Y')); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['waktu'] ?? false): ?><tr><td style="color:var(--muted);">Waktu</td><td><?php echo e($ac['waktu'] ?? ''); ?><?php echo e(($ac['waktu_selesai'] ?? false) ? ' - '.$ac['waktu_selesai'] : ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['zona_waktu'] ?? false): ?><tr><td style="color:var(--muted);">Zona</td><td><?php echo e($ac['zona_waktu'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['lokasi'] ?? false): ?><tr><td style="color:var(--muted);">Lokasi</td><td><?php echo e($ac['lokasi'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['alamat'] ?? false): ?><tr><td style="color:var(--muted);">Alamat</td><td><?php echo e($ac['alamat'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ac['maps'] ?? false): ?><tr><td style="color:var(--muted);">Maps</td><td><a href="<?php echo e($ac['maps']); ?>" target="_blank" style="color:var(--amber);font-size:0.82rem;">Lihat</a></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                      </table>
                                  </div>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                          </div>
                          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if((isset($fd['love_story']) && is_array($fd['love_story']) && count($fd['love_story']) > 0) || ($fd['love_story_motto'] ?? false) || ($fd['love_story_tanggal'] ?? false) || ($fd['love_story_tunangan'] ?? false)): ?>
                          <div class="detail-section" style="margin-bottom:14px;">
                              <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;">
                                  <i class="fa-solid fa-book-heart"></i> Data Love Story
                              </h4>
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
                          <div class="detail-section" style="margin-bottom:14px;">
                              <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;">
                                  <i class="fa-solid fa-gift"></i> Kado Digital
                              </h4>
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
                          <div class="detail-section" style="margin-bottom:14px;">
                              <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;">
                                  <i class="fa-solid fa-box"></i> Kado Fisik
                              </h4>
                              <table style="width:100%;font-size:0.85rem;">
                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['kado_fisik_nama'] ?? false): ?><tr><td style="color:var(--muted);width:140px;padding:3px 0;">Penerima</td><td><?php echo e($fd['kado_fisik_nama'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['kado_fisik_wa'] ?? false): ?><tr><td style="color:var(--muted);">WA</td><td><?php echo e($fd['kado_fisik_wa'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['kado_fisik_alamat'] ?? false): ?><tr><td style="color:var(--muted);vertical-align:top;">Alamat</td><td><?php echo e($fd['kado_fisik_alamat'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                              </table>
                          </div>
                          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($fd['backsound_link'] ?? false) || ($fd['backsound_judul'] ?? false)): ?>
                          <div class="detail-section" style="margin-bottom:14px;">
                              <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;">
                                  <i class="fa-solid fa-music"></i> Backsound & Live
                              </h4>
                              <table style="width:100%;font-size:0.85rem;">
                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['backsound_judul'] ?? false): ?><tr><td style="color:var(--muted);width:140px;padding:3px 0;">Lagu</td><td><?php echo e($fd['backsound_judul'] ?? ''); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['backsound_link'] ?? false): ?><tr><td style="color:var(--muted);">Link</td><td><a href="<?php echo e($fd['backsound_link'] ?? '#'); ?>" target="_blank" style="color:var(--amber);font-size:0.82rem;">Buka</a></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(($fd['backsound_live'] ?? false) !== false): ?><tr><td style="color:var(--muted);">Live</td><td><?php echo e(($fd['backsound_live'] ?? '') == '1' ? 'Ya' : 'Tidak'); ?></td></tr><?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                              </table>
                          </div>
                          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($fd['turut_mengundang'] ?? false): ?>
                          <div class="detail-section">
                              <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;">
                                  <i class="fa-solid fa-people"></i> Turut Mengundang
                              </h4>
                              <div style="font-size:0.85rem;white-space:pre-line;"><?php echo e($fd['turut_mengundang'] ?? ''); ?></div>
                          </div>
                          <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                          <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(isset($fd['foto']) && is_array($fd['foto']) && count($fd['foto']) > 0): ?>
                          <div class="detail-section" style="margin-bottom:14px;">
                              <h4 style="color:var(--amber);margin-bottom:8px;font-size:0.9rem;">
                                  <i class="fa-solid fa-images"></i> Foto
                              </h4>
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
                              <a href="<?php echo e($detailOrder->theme_link); ?>" target="_blank" class="btn-sm btn-ghost">
                                  <i class="fa-solid fa-eye"></i> Lihat Preview Tema
                              </a>
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
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\livewire\admin\order-masuk.blade.php ENDPATH**/ ?>