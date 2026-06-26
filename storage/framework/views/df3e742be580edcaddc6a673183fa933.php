<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>503 — Sedang Maintenance</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/icon.ico')); ?>">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            background: #0a0a0a;
            color: #f1f5f9;
            font-family: 'Outfit', -apple-system, BlinkMacSystemFont, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 24px;
        }
        .container {
            text-align: center;
            max-width: 520px;
        }
        .icon {
            font-size: 5rem;
            margin-bottom: 24px;
            animation: pulse 2s ease-in-out infinite;
        }
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        h1 {
            font-size: 1.8rem;
            margin-bottom: 12px;
            font-weight: 600;
        }
        p {
            color: #94a3b8;
            font-size: 1rem;
            margin-bottom: 32px;
            line-height: 1.6;
        }
        .info-box {
            background: rgba(245, 158, 11, 0.1);
            border: 1px solid rgba(245, 158, 11, 0.2);
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 32px;
            font-size: 0.9rem;
            color: #f59e0b;
        }
        .secondary-link {
            display: inline-block;
            color: #f59e0b;
            text-decoration: none;
            font-size: 0.9rem;
            margin-top: 24px;
        }
        .secondary-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="icon">🔧</div>
        <h1>Sedang Maintenance</h1>
        <p>Kami sedang melakukan pemeliharaan sistem untuk meningkatkan layanan. Website akan kembali online dalam waktu singkat.</p>
        <div class="info-box">
            Terima kasih atas kesabaran Anda. Kami akan kembali segera! ⚡
        </div>
        <a href="https://wa.me/6287760058673" target="_blank" class="secondary-link">
            Hubungi kami via WhatsApp jika ada pertanyaan &rarr;
        </a>
    </div>
</body>
</html>
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\errors\503.blade.php ENDPATH**/ ?>