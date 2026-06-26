<main class="page">
    <div class="page-header">
        <div>
            <h1 class="page-title">Activity Logs</h1>
            <p class="page-subtitle">Riwayat aktivitas dan perubahan data oleh admin & karyawan.</p>
        </div>
    </div>

    <div class="card">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>User</th>
                        <th>Aksi</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td style="white-space:nowrap;"><?php echo e($log->created_at->format('d/m/Y H:i')); ?></td>
                            <td>
                                <strong><?php echo e($log->user?->name ?? 'Sistem'); ?></strong><br />
                                <small style="color:var(--muted)"><?php echo e($log->user?->email ?? '-'); ?></small>
                            </td>
                            <td><span class="badge badge-progress"><?php echo e($log->action); ?></span></td>
                            <td style="max-width:300px;"><?php echo e($log->description); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr><td colspan="4" style="text-align:center;color:var(--muted);padding:40px;">Belum ada aktivitas.</td></tr>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </tbody>
            </table>
        </div>
        <div style="padding:12px 0;"><?php echo e($logs->links()); ?></div>
    </div>
</main>
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\livewire\admin\activity-logs.blade.php ENDPATH**/ ?>