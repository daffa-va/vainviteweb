<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Order Terkirim — Va Invite</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icon.ico') }}">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            background: #0a0a0a;
            color: #f1f5f9;
            font-family: 'Outfit', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            text-align: center;
            padding: 24px;
        }
        .card {
            background: #141414;
            border: 1px solid rgba(255,255,255,0.06);
            border-radius: 16px;
            padding: 48px 32px;
            max-width: 480px;
            width: 100%;
        }
        .icon { font-size: 3rem; margin-bottom: 16px; }
        h1 { font-family: 'Playfair Display', serif; font-size: 1.6rem; margin-bottom: 8px; }
        p { color: #94a3b8; line-height: 1.6; margin-bottom: 24px; }
        .summary { text-align: left; background: #1a1a1a; border-radius: 10px; padding: 16px; margin-bottom: 24px; font-size: 0.85rem; }
        .summary-row { display: flex; justify-content: space-between; padding: 6px 0; border-bottom: 1px solid rgba(255,255,255,0.04); }
        .summary-row:last-child { border-bottom: none; }
        .summary-label { color: #64748b; }
        .summary-value { color: #f1f5f9; font-weight: 500; }
        .btn {
            display: inline-flex; align-items: center; gap: 8px;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: #000; font-weight: 700; padding: 14px 28px;
            border-radius: 10px; text-decoration: none; font-size: 1rem;
            transition: 0.3s;
        }
        .btn:hover { transform: scale(1.03); box-shadow: 0 0 20px rgba(245,158,11,0.3); }
        .btn-secondary {
            display: inline-block; margin-top: 12px;
            color: #f59e0b; text-decoration: none; font-size: 0.9rem;
        }
        .btn-secondary:hover { text-decoration: underline; }
        .countdown { font-size: 0.8rem; color: #64748b; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="card">
        <div class="icon">✅</div>
        <h1>Order Terkirim!</h1>
        <p>Terima kasih, pesanan kamu sudah tercatat di sistem kami. Silakan lanjut ke WhatsApp untuk konfirmasi lebih lanjut.</p>

        <div class="summary">
            <div class="summary-row">
                <span class="summary-label">Nama</span>
                <span class="summary-value">{{ $nama }}</span>
            </div>
            @if($mempelai)
            <div class="summary-row">
                <span class="summary-label">Mempelai</span>
                <span class="summary-value">{{ $mempelai }}</span>
            </div>
            @endif
            <div class="summary-row">
                <span class="summary-label">Tema</span>
                <span class="summary-value">{{ $tema }}</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Kategori</span>
                <span class="summary-value">{{ $kategori }}</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Opsi</span>
                <span class="summary-value">{{ $opsi }}</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Harga</span>
                <span class="summary-value">Rp {{ $harga }}</span>
            </div>
        </div>

        <a href="{{ $wa_url }}" target="_blank" class="btn" id="waBtn">
            <i class="fa-brands fa-whatsapp"></i> Lanjut ke WhatsApp
        </a>
        <br />
        <a href="{{ route('home') }}" class="btn-secondary">Kembali ke Beranda</a>
        <div class="countdown">Halaman ini akan otomatis mengarahkan ke WhatsApp dalam <span id="timer">8</span> detik...</div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <script>
        let seconds = 8;
        const timer = document.getElementById('timer');
        const btn = document.getElementById('waBtn');
        const interval = setInterval(() => {
            seconds--;
            timer.textContent = seconds;
            if (seconds <= 0) {
                clearInterval(interval);
                window.open(btn.href, '_blank');
            }
        }, 1000);
    </script>
</body>
</html>
