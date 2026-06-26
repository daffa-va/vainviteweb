<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lacak Pesanan — Va Invite</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/icon.ico')); ?>">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fontawesome-free-7/css/all.min.css')); ?>" />
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            background: #0a0a0a;
            color: #f1f5f9;
            font-family: 'Outfit', sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .container { max-width: 640px; margin: 0 auto; padding: 40px 16px; width: 100%; }
        .back-link {
            display:inline-flex; align-items:center; gap:6px;
            color:#888; text-decoration:none; font-size:0.85rem; margin-bottom:24px;
            transition:color .2s;
        }
        .back-link:hover { color:#f59e0b; }
        h1 {
            font-family:'Playfair Display',serif;
            font-size:1.5rem; margin-bottom:4px;
        }
        .subtitle { color:#888; font-size:0.88rem; margin-bottom:24px; }
        .search-card {
            background:#141414; border:1px solid rgba(255,255,255,0.07); border-radius:14px;
            padding:24px; margin-bottom:24px;
        }
        .search-card form { display:flex; gap:10px; }
        .search-card input {
            flex:1; background:#111; border:1px solid rgba(255,255,255,0.1);
            border-radius:10px; padding:11px 14px; color:#fff; font-family:inherit;
            font-size:0.9rem; outline:none;
        }
        .search-card input:focus { border-color:rgba(255,255,255,0.25); }
        .search-card input::placeholder { color:rgba(255,255,255,0.3); }
        .search-card button {
            background:linear-gradient(135deg,#f59e0b,#d97706); color:#000; border:none;
            padding:11px 20px; border-radius:10px; font-weight:600; font-size:0.88rem;
            cursor:pointer; font-family:inherit; white-space:nowrap;
        }
        .search-card button:hover { opacity:0.9; }
        .order-card {
            background:#141414; border:1px solid rgba(255,255,255,0.07); border-radius:12px;
            padding:18px; margin-bottom:12px;
        }
        .order-header { display:flex; justify-content:space-between; align-items:center; margin-bottom:10px; }
        .order-id { font-size:0.78rem; color:#64748b; }
        .badge {
            display:inline-block; padding:3px 10px; border-radius:20px;
            font-size:0.75rem; font-weight:600;
        }
        .badge-pending { background:rgba(245,158,11,0.15); color:#f59e0b; }
        .badge-progress { background:rgba(59,130,246,0.15); color:#60a5fa; }
        .badge-done { background:rgba(34,197,94,0.15); color:#22c55e; }
        .badge-cancelled { background:rgba(239,68,68,0.15); color:#ef4444; }
        .order-detail { font-size:0.85rem; color:#94a3b8; line-height:1.8; }
        .order-detail strong { color:#f1f5f9; }
        .empty { text-align:center; color:#64748b; padding:40px 0; font-size:0.9rem; }
        .empty i { font-size:2rem; margin-bottom:12px; display:block; color:rgba(255,255,255,0.1); }
        .hint { font-size:0.78rem; color:#555; margin-top:6px; }
        @media (max-width:480px) {
            .search-card form { flex-direction:column; }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="<?php echo e(url('/')); ?>" class="back-link">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
        </a>

        <h1>Lacak Pesanan</h1>
        <p class="subtitle">Masukkan nomor WhatsApp yang digunakan saat order untuk melihat status pesanan.</p>

        <div class="search-card">
            <form action="<?php echo e(route('public.order.track')); ?>" method="GET">
                <input type="tel" name="phone" placeholder="Cth: 08123456789" value="<?php echo e($phone ?? ''); ?>" required />
                <button type="submit"><i class="fa-solid fa-search"></i> Cari</button>
            </form>
        </div>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($orders !== null): ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($orders) > 0): ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $o): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="order-card">
                        <div class="order-header">
                            <span class="order-id">#<?php echo e($o->id); ?> • <?php echo e(\Carbon\Carbon::parse($o->created_at)->translatedFormat('d M Y, H:i')); ?></span>
                            <span class="badge badge-<?php echo e($o->status); ?>">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php switch($o->status):
                                    case ('pending'): ?> Menunggu <?php break; ?>
                                    <?php case ('progress'): ?> Diproses <?php break; ?>
                                    <?php case ('done'): ?> Selesai <?php break; ?>
                                    <?php case ('cancelled'): ?> Dibatalkan <?php break; ?>
                                    <?php default: ?> <?php echo e($o->status); ?>

                                <?php endswitch; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </span>
                        </div>
                        <div class="order-detail">
                            <strong><?php echo e($o->theme_name ?? 'Undangan'); ?></strong> — <?php echo e($o->theme_category ?? '-'); ?>

                            <br /><?php echo e($o->client_name ?? '-'); ?>

                        </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($o->status === 'done' && $o->result_link): ?>
                            <div style="margin-top:10px;">
                                <a href="<?php echo e($o->result_link); ?>" target="_blank" style="display:inline-flex;align-items:center;gap:6px;background:linear-gradient(135deg,#f59e0b,#d97706);color:#000;padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.82rem;">
                                    <i class="fa-solid fa-up-right-from-square"></i> Lihat Undangan
                                </a>
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php else: ?>
                <div class="empty">
                <i class="fa-solid fa-inbox"></i>
                Tidak ada pesanan ditemukan untuk nomor <strong><?php echo e($phone ?? ''); ?></strong>.
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        <?php else: ?>
            <div class="empty">
                <i class="fa-solid fa-search"></i>
                Masukkan nomor WA kamu untuk melihat status pesanan.
            </div>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <div class="hint">Data hanya menampilkan pesanan yang tercatat di sistem Va Invite.</div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\track-order.blade.php ENDPATH**/ ?>