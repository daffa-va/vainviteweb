<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>404 — Halaman Tidak Ditemukan</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icon.ico') }}">
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
        .code {
            font-size: 6rem;
            font-weight: 800;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 16px;
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
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #000;
            padding: 12px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(245, 158, 11, 0.3);
        }
        .secondary-link {
            display: block;
            margin-top: 24px;
            color: #f59e0b;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .secondary-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="code">404</div>
        <h1>Halaman Tidak Ditemukan</h1>
        <p>Maaf, halaman yang Anda cari tidak ada atau sudah dipindahkan. Periksa kembali URL atau kembali ke halaman utama.</p>
        <a href="{{ url('/') }}" class="btn">
            <i class="fa-solid fa-arrow-left"></i> Kembali ke Beranda
        </a>
        <a href="{{ route('public.order.track') }}" class="secondary-link">Atau cek status pesanan &rarr;</a>
    </div>
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free-7/css/all.min.css') }}" />
</body>
</html>
