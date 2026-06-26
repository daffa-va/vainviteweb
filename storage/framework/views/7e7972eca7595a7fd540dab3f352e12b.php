 <main class="page" wire:poll.60s>
     <div class="page-header">
         <div>
             <h1 class="page-title">Ringkasan Sistem</h1>
              <p class="page-subtitle">
                  Statistik performa penjualan dan pengerjaan undangan digital saat ini.
              </p>
         </div>
     </div>

     <div class="stats-grid">
         <div class="stat-card">
             <div class="stat-label">⏳ Menunggu Konfirmasi</div>
             <div class="stat-num">
                 <?php echo e($pendingCount); ?> <span class="stat-unit">order</span>
             </div>
         </div>
         <div class="stat-card">
             <div class="stat-label">🔄 Sedang Dikerjakan</div>
             <div class="stat-num">
                 <?php echo e($progressCount); ?> <span class="stat-unit">order</span>
             </div>
         </div>
         <div class="stat-card">
             <div class="stat-label">✅ Selesai (6 Bulan Terakhir)</div>
             <div class="stat-num">
                 <?php echo e($doneCount); ?> <span class="stat-unit">order</span>
             </div>
         </div>
         <div class="stat-card wide">
             <div class="stat-label">💰 Estimasi Pendapatan Kotor</div>
             <div class="stat-num" style="color: #22c55e">
                 Rp <?php echo e(number_format($grossRevenue, 0, ',', '.')); ?>

             </div>
         </div>
     </div>

      <div class="card" style="margin-top: 24px">
          <div class="card-header">
              <h2 class="card-title">Tema Paling Diminati</h2>
          </div>
          <div class="table-wrapper">
              <table class="table">
                  <thead>
                      <tr>
                          <th>Nama Tema</th>
                          <th>Peminat</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $popularThemes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                          <tr>
                              <td><strong><?php echo e($tema->theme_name); ?></strong></td>
                              <td><span class="badge badge-progress"><?php echo e($tema->total); ?> orang</span></td>
                          </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                          <tr>
                              <td colspan="2" style="text-align: center; color: var(--muted); padding: 30px;">
                                  Belum ada data minat tema.
                              </td>
                          </tr>
                      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                  </tbody>
              </table>
          </div>
      </div>

      <div class="card" style="margin-top: 24px">
         <div class="card-header">
             <h2 class="card-title">Aktivitas Terakhir</h2>
         </div>
         <div class="table-wrapper">
             <table class="table">
                 <thead>
                     <tr>
                          <th>Pelanggan</th>
                          <th>Detail Tema</th>
                          <th>Harga</th>
                         <th>Status</th>
                     </tr>
                 </thead>
                 <tbody>
                     

                     <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $latestOrders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                         <tr>
                             <td>
                                 <strong><?php echo e($order->client_name); ?></strong><br />
                                 <small style="color: var(--muted)"><?php echo e($order->client_wa); ?></small>
                             </td>
                              <td>
                                  <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->theme_category): ?>
                                      <strong><?php echo e($order->theme_category); ?></strong>
                                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->theme_name): ?>
                                          <br /><small style="color: var(--muted)">Tema: <?php echo e($order->theme_name); ?></small>
                                      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->has_photo !== null): ?>
                                          <br /><small style="color: var(--amber)"><?php echo e($order->has_photo ? 'Dengan Foto' : 'Tanpa Foto'); ?></small>
                                      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                  <?php elseif($order->price): ?>
                                      <?php echo e($order->price->name); ?> <small
                                          style="color: var(--amber)">(<?php echo e($order->price->category); ?>)</small>
                                  <?php else: ?>
                                      <span style="color: var(--red)">Layanan Dihapus</span>
                                  <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                              </td>
                             <td style="font-weight: 600;">Rp <?php echo e(number_format($order->total_price, 0, ',', '.')); ?></td>
                             <td>
                                 <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($order->status === 'pending'): ?>
                                     <span class="badge badge-pending"><i
                                             class="fa-solid fa-hourglass-half icon-spacing"></i> Menunggu</span>
                                 <?php elseif($order->status === 'progress'): ?>
                                     <span class="badge badge-progress"><i
                                             class="fa-solid fa-spinner fa-spin icon-spacing"></i> Dikerjakan</span>
                                 <?php else: ?>
                                     <span class="badge badge-done"><i
                                             class="fa-solid fa-circle-check icon-spacing"></i> Selesai</span>
                                 <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                             </td>
                         </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                         <tr>
                             <td colspan="4" style="text-align: center; color: var(--muted); padding: 30px;">
                                 Belum ada aktivitas transaksi terekam di sistem.
                             </td>
                         </tr>
                     <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                 </tbody>
             </table>
         </div>
     </div>
 </main>
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\livewire\admin\dashboard.blade.php ENDPATH**/ ?>