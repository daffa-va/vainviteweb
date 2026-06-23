<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Pemesanan — Va Invite</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icon.ico') }}">
    <meta name="robots" content="noindex, nofollow" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        * { margin:0; padding:0; box-sizing:border-box; }
        body {
            font-family:'Outfit',sans-serif;
            background:#0a0a0a;
            color:#f1f5f9;
            min-height:100vh;
        }
        .form-page {
            max-width:720px;
            margin:0 auto;
            padding:24px 16px 48px;
        }
        .back-link {
            display:inline-flex;
            align-items:center;
            gap:6px;
            color:#888;
            text-decoration:none;
            font-size:0.85rem;
            margin-bottom:20px;
            transition:color .2s;
        }
        .back-link:hover { color:#f59e0b; }
        .form-title {
            font-family:'Playfair Display',serif;
            font-size:1.6rem;
            margin-bottom:4px;
        }
        .form-subtitle {
            color:#888;
            font-size:0.9rem;
            margin-bottom:24px;
        }
        .notice-box {
            background:rgba(245,158,11,0.08);
            border:1px solid rgba(245,158,11,0.2);
            border-radius:12px;
            padding:14px 18px;
            margin-bottom:24px;
            font-size:0.82rem;
            line-height:1.6;
        }
        .notice-box strong { color:#f59e0b; }
        .notice-box ul { margin:6px 0 0 18px; color:#aaa; }
        .card {
            background:#141414;
            border:1px solid rgba(255,255,255,0.07);
            border-radius:16px;
            padding:24px;
            margin-bottom:18px;
        }
        .card-title {
            font-size:1rem;
            font-weight:700;
            margin-bottom:18px;
            display:flex;
            align-items:center;
            gap:10px;
            color:#f59e0b;
            padding-bottom:12px;
            border-bottom:1px solid rgba(255,255,255,0.05);
        }
        .card-title i { width:20px; text-align:center; }
        .form-row {
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:14px;
        }
        .form-row-3 {
            display:grid;
            grid-template-columns:1fr 1fr 1fr;
            gap:14px;
        }
        .form-group { margin-bottom:16px; }
        .form-group:last-child { margin-bottom:0; }
        .form-label {
            display:block;
            font-size:0.82rem;
            font-weight:500;
            color:#b3b3b3;
            margin-bottom:5px;
        }
        .required { color:#ef4444; }
        .form-input {
            width:100%;
            background:#111;
            border:1px solid rgba(255,255,255,0.08);
            border-radius:10px;
            padding:11px 14px;
            color:#fff;
            font-family:inherit;
            font-size:0.88rem;
            outline:none;
            transition:border-color .25s;
        }
        .form-input:focus { border-color:rgba(255,255,255,0.25); }
        .form-input::placeholder { color:rgba(255,255,255,0.25); }
        .form-textarea { min-height:80px; resize:vertical; }
        .form-textarea.small { min-height:60px; }
        .radio-group {
            display:flex;
            gap:12px;
            flex-wrap:wrap;
        }
        .radio-card {
            flex:1;
            min-width:160px;
            background:#111;
            border:1px solid rgba(255,255,255,0.08);
            border-radius:10px;
            padding:14px 16px;
            cursor:pointer;
            transition:all .2s;
            display:flex;
            align-items:center;
            gap:10px;
        }
        .radio-card:hover { border-color:rgba(255,255,255,0.2); }
        .radio-card input[type="radio"] { accent-color:#f59e0b; width:16px; height:16px; flex-shrink:0; }
        .radio-card.selected { border-color:#f59e0b; background:rgba(245,158,11,0.08); }
        .radio-info { display:flex; flex-direction:column; gap:2px; }
        .radio-name { font-weight:600; font-size:0.88rem; }
        .radio-price { font-size:0.78rem; color:#f59e0b; }
        .total-row {
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding-top:14px;
            margin-top:14px;
            border-top:1px solid rgba(255,255,255,0.06);
        }
        .total-label { font-size:0.95rem; font-weight:600; }
        .total-price { font-size:1.2rem; font-weight:700; color:#f59e0b; }
        .btn-submit {
            width:100%;
            display:inline-flex;
            align-items:center;
            justify-content:center;
            gap:8px;
            background:linear-gradient(135deg,#f59e0b,#d97706);
            color:#000;
            border:none;
            padding:14px 24px;
            border-radius:12px;
            font-weight:700;
            font-size:1rem;
            cursor:pointer;
            font-family:inherit;
            transition:all .25s;
            margin-top:8px;
        }
        .btn-submit:hover {
            transform:translateY(-2px);
            box-shadow:0 8px 25px rgba(245,158,11,0.3);
        }
        .wa-fallback {
            text-align:center;
            margin-top:16px;
            font-size:0.82rem;
            color:#888;
        }
        .wa-fallback a { color:#25D366; text-decoration:none; font-weight:600; }
        .wa-fallback a:hover { text-decoration:underline; }
        .summary-grid {
            display:flex;
            flex-direction:column;
            gap:8px;
        }
        .summary-row {
            display:flex;
            justify-content:space-between;
            align-items:center;
            font-size:0.88rem;
        }
        .summary-label { color:#888; }
        .summary-value { font-weight:600; text-align:right; }
        .summary-link { color:#f59e0b; text-decoration:none; font-size:0.82rem; }
        .summary-link:hover { text-decoration:underline; }
        @media (max-width:600px) {
            .form-page { padding:16px 12px 32px; }
            .card { padding:18px; }
            .form-row, .form-row-3 { grid-template-columns:1fr; }
            .radio-group { flex-direction:column; }
            .radio-card { min-width:unset; }
            .form-title { font-size:1.3rem; }
        }
    </style>
</head>

<body>

<div class="form-page">
    <a href="{{ url('/') }}#catalog" class="back-link">
        <i class="fa-solid fa-arrow-left"></i> Kembali ke Katalog
    </a>

    <h1 class="form-title">Form Pesanan Undangan</h1>
    <p class="form-subtitle">Lengkapi data di bawah ini dengan benar sesuai EYD untuk proses pesanan undangan digital Anda.</p>

    <div class="notice-box">
        <strong><i class="fa-solid fa-circle-exclamation"></i> HARAP BACA SEBELUM MENGISI FORM:</strong>
        <ul>
            <li>Field yang bertanda <span class="required">*</span> <strong>wajib diisi</strong>.</li>
            <li>Pastikan penulisan nama, tanggal, dan alamat menggunakan <strong>EYD</strong> yang benar.</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-title"><i class="fa-solid fa-receipt"></i> Ringkasan Pesanan</div>
        <div class="summary-grid">
            <div class="summary-row">
                <span class="summary-label">Kategori</span>
                <span class="summary-value">{{ $category }}</span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Tema</span>
                <span class="summary-value">{{ $themeName }}</span>
            </div>
            @if ($themeLink)
            <div class="summary-row">
                <span class="summary-label">Preview</span>
                <a href="{{ $themeLink }}" target="_blank" class="summary-link">Lihat Contoh <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.7rem;"></i></a>
            </div>
            @endif
        </div>
    </div>

    <form action="{{ route('public.order.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="theme_category" value="{{ $category }}">
        <input type="hidden" name="theme_name" value="{{ $themeName }}">
        <input type="hidden" name="theme_slug" value="{{ $slug }}">
        <input type="hidden" name="theme_link" value="{{ $themeLink }}">

        {{-- DATA MEMPELAI --}}
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-heart"></i> Data Mempelai</div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nama Panggilan Pria <span class="required">*</span></label>
                    <input type="text" name="data_mempelai_pria_panggilan" class="form-input" placeholder="Cth: Pria" required />
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Panggilan Wanita <span class="required">*</span></label>
                    <input type="text" name="data_mempelai_wanita_panggilan" class="form-input" placeholder="Cth: Wanita" required />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap Pria <span class="required">*</span></label>
                    <input type="text" name="data_mempelai_pria_lengkap" class="form-input" placeholder="Cth: Nama Pria" required />
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Lengkap Wanita <span class="required">*</span></label>
                    <input type="text" name="data_mempelai_wanita_lengkap" class="form-input" placeholder="Cth: Nama Wanita" required />
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nama Orang Tua Pria</label>
                    <input type="text" name="data_mempelai_ortu_pria" class="form-input" placeholder="Cth: Bpk. Contoh & Ibu Contoh" />
                </div>
                <div class="form-group">
                    <label class="form-label">Nama Orang Tua Wanita</label>
                    <input type="text" name="data_mempelai_ortu_wanita" class="form-input" placeholder="Cth: Bpk. Contoh & Ibu Contoh" />
                </div>
            </div>
        </div>

        {{-- DATA PEMESAN --}}
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-user-pen"></i> Data Pemesan</div>
            <div class="form-row">
                <div class="form-group">
                    <label class="form-label">Nama Lengkap <span class="required">*</span></label>
                    <input type="text" name="client_name" class="form-input" placeholder="Masukkan nama lengkap Anda" required />
                </div>
                <div class="form-group">
                    <label class="form-label">No. WhatsApp Aktif <span class="required">*</span></label>
                    <input type="tel" name="client_wa" class="form-input" placeholder="Cth: 08123456789" required />
                </div>
            </div>
        </div>

        {{-- DATA ACARA --}}
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-calendar-days"></i> Data Acara</div>

            <div class="acara-block" id="acara-block-1" style="background:#111;border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:18px;margin-bottom:14px;">
                <h4 style="font-size:0.9rem;font-weight:600;margin-bottom:12px;color:#f59e0b;">Acara 1</h4>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Acara 1 <span class="required">*</span></label>
                        <input type="text" name="acara_nama_1" class="form-input" placeholder="Cth: Akad" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Acara 1 <span class="required">*</span></label>
                        <input type="date" name="acara_tanggal_1" class="form-input" required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Waktu</label>
                        <input type="time" name="acara_waktu_1" class="form-input" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Waktu Selesai (opsional)</label>
                        <input type="time" name="acara_waktu_selesai_1" class="form-input" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Zona Waktu</label>
                    <select name="acara_zona_1" class="form-input" style="padding-left:14px;">
                        <option value="">Pilih Zona Waktu</option>
                        <option value="WIB">WIB (Waktu Indonesia Barat)</option>
                        <option value="WITA">WITA (Waktu Indonesia Tengah)</option>
                        <option value="WIT">WIT (Waktu Indonesia Timur)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="acara_lokasi_1" class="form-input" placeholder="Cth: Kediaman Mempelai Wanita, Gedung Serbaguna, Hotel, Masjid, dll." />
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="acara_alamat_1" class="form-input form-textarea small" placeholder="Cth: Dusun, RT/RW, Desa, Kecamatan, Kabupaten, Provinsi"></textarea>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Google Maps</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-map-location-dot input-icon"></i>
                        <input type="url" name="acara_maps_1" class="form-input" placeholder="https://maps.app.goo.gl/..." />
                    </div>
                </div>
            </div>

            <div class="acara-block" id="acara-block-2" style="display:none;background:#111;border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:18px;margin-bottom:14px;">
                <h4 style="font-size:0.9rem;font-weight:600;margin-bottom:12px;color:#f59e0b;">Acara 2
                    <button type="button" class="btn-hapus-acara" data-target="acara-block-2" style="float:right;background:none;border:1px solid rgba(255,255,255,0.15);color:#999;border-radius:6px;padding:2px 10px;font-size:0.78rem;cursor:pointer;">Hapus</button>
                </h4>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Acara 2 <span class="required">*</span></label>
                        <input type="text" name="acara_nama_2" class="form-input" placeholder="Cth: Resepsi" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Acara 2 <span class="required">*</span></label>
                        <input type="date" name="acara_tanggal_2" class="form-input" required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Waktu</label>
                        <input type="time" name="acara_waktu_2" class="form-input" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Waktu Selesai (opsional)</label>
                        <input type="time" name="acara_waktu_selesai_2" class="form-input" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Zona Waktu</label>
                    <select name="acara_zona_2" class="form-input" style="padding-left:14px;">
                        <option value="">Pilih Zona Waktu</option>
                        <option value="WIB">WIB (Waktu Indonesia Barat)</option>
                        <option value="WITA">WITA (Waktu Indonesia Tengah)</option>
                        <option value="WIT">WIT (Waktu Indonesia Timur)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="acara_lokasi_2" class="form-input" placeholder="Cth: Kediaman Mempelai Wanita, Gedung Serbaguna, Hotel, Masjid, dll." />
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="acara_alamat_2" class="form-input form-textarea small" placeholder="Cth: Dusun, RT/RW, Desa, Kecamatan, Kabupaten, Provinsi"></textarea>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Google Maps</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-map-location-dot input-icon"></i>
                        <input type="url" name="acara_maps_2" class="form-input" placeholder="https://maps.app.goo.gl/..." />
                    </div>
                </div>
            </div>

            <div class="acara-block" id="acara-block-3" style="display:none;background:#111;border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:18px;margin-bottom:14px;">
                <h4 style="font-size:0.9rem;font-weight:600;margin-bottom:12px;color:#f59e0b;">Acara 3
                    <button type="button" class="btn-hapus-acara" data-target="acara-block-3" style="float:right;background:none;border:1px solid rgba(255,255,255,0.15);color:#999;border-radius:6px;padding:2px 10px;font-size:0.78rem;cursor:pointer;">Hapus</button>
                </h4>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Acara 3 <span class="required">*</span></label>
                        <input type="text" name="acara_nama_3" class="form-input" placeholder="Cth: Ngunduh Mantu" required />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Acara 3 <span class="required">*</span></label>
                        <input type="date" name="acara_tanggal_3" class="form-input" required />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Waktu</label>
                        <input type="time" name="acara_waktu_3" class="form-input" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Waktu Selesai (opsional)</label>
                        <input type="time" name="acara_waktu_selesai_3" class="form-input" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Zona Waktu</label>
                    <select name="acara_zona_3" class="form-input" style="padding-left:14px;">
                        <option value="">Pilih Zona Waktu</option>
                        <option value="WIB">WIB (Waktu Indonesia Barat)</option>
                        <option value="WITA">WITA (Waktu Indonesia Tengah)</option>
                        <option value="WIT">WIT (Waktu Indonesia Timur)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Lokasi</label>
                    <input type="text" name="acara_lokasi_3" class="form-input" placeholder="Cth: Kediaman Mempelai Wanita, Gedung Serbaguna, Hotel, Masjid, dll." />
                </div>
                <div class="form-group">
                    <label class="form-label">Alamat Lengkap</label>
                    <textarea name="acara_alamat_3" class="form-input form-textarea small" placeholder="Cth: Dusun, RT/RW, Desa, Kecamatan, Kabupaten, Provinsi"></textarea>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Google Maps</label>
                    <div class="input-wrap">
                        <i class="fa-solid fa-map-location-dot input-icon"></i>
                        <input type="url" name="acara_maps_3" class="form-input" placeholder="https://maps.app.goo.gl/..." />
                    </div>
                </div>
            </div>

            <div style="margin-top:6px;">
                <button type="button" class="btn-tambah-acara" onclick="tambahAcara()" style="background:none;border:1px dashed rgba(255,255,255,0.2);color:#f59e0b;padding:10px 20px;border-radius:10px;cursor:pointer;font-size:0.85rem;width:100%;">
                    <i class="fa-solid fa-plus"></i> Tambah Acara
                </button>
            </div>
        </div>

        {{-- DATA LOVE STORY --}}
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-book-heart"></i> Data Love Story</div>
            <div style="font-size:0.82rem;color:#666;margin-bottom:14px;">Bisa dikosongkan (silahkan diisi jika diperlukan)</div>

            <div class="love-story-block" id="love-story-1" style="display:none;background:#111;border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:18px;margin-bottom:14px;">
                <h4 style="font-size:0.9rem;font-weight:600;margin-bottom:12px;color:#f59e0b;">
                    Love Story 1
                    <button type="button" class="btn-hapus-love" data-target="love-story-1" style="float:right;background:none;border:1px solid rgba(255,255,255,0.15);color:#999;border-radius:6px;padding:2px 10px;font-size:0.78rem;cursor:pointer;">Hapus</button>
                </h4>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Cerita Love Story 1</label>
                    <textarea name="love_story_1" class="form-input form-textarea" placeholder="Tulis cerita cinta kalian (opsional)"></textarea>
                </div>
            </div>

            <div class="love-story-block" id="love-story-2" style="display:none;background:#111;border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:18px;margin-bottom:14px;">
                <h4 style="font-size:0.9rem;font-weight:600;margin-bottom:12px;color:#f59e0b;">
                    Love Story 2
                    <button type="button" class="btn-hapus-love" data-target="love-story-2" style="float:right;background:none;border:1px solid rgba(255,255,255,0.15);color:#999;border-radius:6px;padding:2px 10px;font-size:0.78rem;cursor:pointer;">Hapus</button>
                </h4>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Cerita Love Story 2</label>
                    <textarea name="love_story_2" class="form-input form-textarea" placeholder="Tulis cerita cinta kalian (opsional)"></textarea>
                </div>
            </div>

            <div class="love-story-block" id="love-story-3" style="display:none;background:#111;border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:18px;margin-bottom:14px;">
                <h4 style="font-size:0.9rem;font-weight:600;margin-bottom:12px;color:#f59e0b;">
                    Love Story 3
                    <button type="button" class="btn-hapus-love" data-target="love-story-3" style="float:right;background:none;border:1px solid rgba(255,255,255,0.15);color:#999;border-radius:6px;padding:2px 10px;font-size:0.78rem;cursor:pointer;">Hapus</button>
                </h4>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Cerita Love Story 3</label>
                    <textarea name="love_story_3" class="form-input form-textarea" placeholder="Tulis cerita cinta kalian (opsional)"></textarea>
                </div>
            </div>

            <div class="love-story-block" id="love-story-4" style="display:none;background:#111;border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:18px;margin-bottom:14px;">
                <h4 style="font-size:0.9rem;font-weight:600;margin-bottom:12px;color:#f59e0b;">
                    Love Story 4
                    <button type="button" class="btn-hapus-love" data-target="love-story-4" style="float:right;background:none;border:1px solid rgba(255,255,255,0.15);color:#999;border-radius:6px;padding:2px 10px;font-size:0.78rem;cursor:pointer;">Hapus</button>
                </h4>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">Cerita Love Story 4</label>
                    <textarea name="love_story_4" class="form-input form-textarea" placeholder="Tulis cerita cinta kalian (opsional)"></textarea>
                </div>
            </div>

            <div style="margin-top:6px;">
                <button type="button" class="btn-tambah-love" onclick="tambahLoveStory()" style="background:none;border:1px dashed rgba(255,255,255,0.2);color:#f59e0b;padding:10px 20px;border-radius:10px;cursor:pointer;font-size:0.85rem;width:100%;">
                    <i class="fa-solid fa-plus"></i> Tambah Love Story
                </button>
            </div>

        </div>

        {{-- KADO DIGITAL --}}
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-gift"></i> Kado Digital / Amplop Online</div>

            @for ($ri = 1; $ri <= 3; $ri++)
            <div class="rekening-block" id="rekening-{{ $ri }}" style="{{ $ri > 1 ? 'display:none;' : '' }}background:#111;border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:18px;margin-bottom:14px;">
                <h4 style="font-size:0.9rem;font-weight:600;margin-bottom:12px;color:#f59e0b;">
                    Rekening {{ $ri }}
                    @if ($ri > 1)
                    <button type="button" class="btn-hapus-rekening" data-target="rekening-{{ $ri }}" style="float:right;background:none;border:1px solid rgba(255,255,255,0.15);color:#999;border-radius:6px;padding:2px 10px;font-size:0.78rem;cursor:pointer;">Hapus</button>
                    @endif
                </h4>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Bank</label>
                        <input type="text" name="kado_digital_bank_{{ $ri }}" class="form-input" placeholder="Cth: BCA, Mandiri, BRI" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Atas Nama</label>
                        <input type="text" name="kado_digital_an_{{ $ri }}" class="form-input" placeholder="Cth: Nama Pemilik" />
                    </div>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">No. Rekening</label>
                    <input type="text" name="kado_digital_norek_{{ $ri }}" class="form-input" placeholder="Cth: 1234567890" />
                </div>
            </div>
            @endfor

            <div style="margin-top:6px;">
                <button type="button" class="btn-tambah-rekening" onclick="tambahRekening()" style="background:none;border:1px dashed rgba(255,255,255,0.2);color:#f59e0b;padding:10px 20px;border-radius:10px;cursor:pointer;font-size:0.85rem;width:100%;">
                    <i class="fa-solid fa-plus"></i> Tambah Rekening
                </button>
            </div>
        </div>

        {{-- KADO FISIK --}}
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-box"></i> Kado Fisik</div>
            <div class="form-group">
                <label class="form-label">Nama Penerima Kado</label>
                <input type="text" name="kado_fisik_nama" class="form-input" placeholder="Cth: Nama Penerima" />
            </div>
            <div class="form-group">
                <label class="form-label">Whatsapp Konfirmasi</label>
                <input type="text" name="kado_fisik_wa" class="form-input" placeholder="Cth: 08xxxxxxxxxx" />
            </div>
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label">Alamat Pengiriman Kado</label>
                <textarea name="kado_fisik_alamat" class="form-input form-textarea small" placeholder="Cth: Dusun, RT/RW, Desa, Kecamatan, Kabupaten, Provinsi"></textarea>
            </div>
        </div>

        {{-- BACKSOUND MUSIK & LIVE --}}
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-music"></i> Backsound Musik & Live Streaming</div>
            <div class="form-group">
                <label class="form-label">Link Lagu / Playlist (YouTube, SoundCloud, Spotify)</label>
                <input type="url" name="backsound_link" class="form-input" placeholder="https://youtu.be/..." />
            </div>
            <div class="form-group">
                <label class="form-label">Judul Lagu / Penyanyi</label>
                <input type="text" name="backsound_judul" class="form-input" placeholder="Cth: Judul Lagu - Penyanyi" />
            </div>
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label">Live Streaming</label>
                <div class="radio-group">
                    <label class="radio-card" id="radioLiveYes">
                        <input type="radio" name="backsound_live" value="1" />
                        <div class="radio-info">
                            <span class="radio-name">Ya, ada sesi live</span>
                            <span class="radio-price" style="color:#aaa;">Akan dikonfirmasi</span>
                        </div>
                    </label>
                    <label class="radio-card" id="radioLiveNo">
                        <input type="radio" name="backsound_live" value="0" checked />
                        <div class="radio-info">
                            <span class="radio-name">Tidak</span>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        {{-- TURUT MENGUNDANG --}}
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-people"></i> Turut Mengundang</div>
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label">Nama Keluarga / Pihak yang Turut Mengundang</label>
                <textarea name="turut_mengundang" class="form-input form-textarea" placeholder="Cth: Keluarga Besar Bpk. Contoh & Ibu Contoh&#10;Keluarga Besar Bpk. Contoh & Ibu Contoh"></textarea>
                <div style="font-size:0.75rem;color:#666;margin-top:4px;">Pisahkan dengan baris baru jika lebih dari satu.</div>
            </div>
        </div>

        {{-- OPSI & HARGA --}}
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-tag"></i> Opsi & Harga</div>
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label">Opsi Undangan <span class="required">*</span></label>
                <div class="radio-group">
                    <label class="radio-card" id="radioWithPhoto">
                        <input type="radio" name="has_photo" value="1" checked />
                        <div class="radio-info">
                            <span class="radio-name">Dengan Foto</span>
                            <span class="radio-price">Rp109.000</span>
                        </div>
                    </label>
                    <label class="radio-card" id="radioWithoutPhoto">
                        <input type="radio" name="has_photo" value="0" />
                        <div class="radio-info">
                            <span class="radio-name">Tanpa Foto</span>
                            <span class="radio-price">Rp79.000</span>
                        </div>
                    </label>
                </div>
            </div>
            <div class="total-row">
                <span class="total-label">Total Harga</span>
                <span class="total-price" id="totalPrice">Rp109.000</span>
            </div>
        </div>

        {{-- UPLOAD FOTO --}}
        <div class="card" id="uploadFotoSection" style="display:none;">
            <div class="card-title"><i class="fa-solid fa-images"></i> Upload Foto</div>
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label">Pilih Foto (max 1MB per file)</label>
                <input type="file" name="fotos[]" multiple accept="image/*" id="fotoInput" class="form-input" style="padding:10px;font-size:0.82rem;" />
                <div style="font-size:0.75rem;color:#666;margin-top:3px;">Format: JPG, PNG, WEBP. Maks 1MB per file.</div>
                <div id="fotoError" style="color:#ef4444;font-size:0.82rem;display:none;margin-top:6px;"></div>
            </div>
            <div id="fotoGallery" style="display:flex;gap:10px;flex-wrap:wrap;margin-top:12px;"></div>
        </div>

        <button type="submit" class="btn-submit">
            <i class="fa-solid fa-paper-plane"></i> Kirim Pesanan
        </button>
    </form>

    <div class="wa-fallback">
        Atau hubungi langsung via <a href="https://wa.me/{{ $whatsapp_number }}" target="_blank">WhatsApp <i class="fa-brands fa-whatsapp"></i></a>
    </div>
</div>

<script>
var acaraTerlihat = {2: false, 3: false};
var loveTerlihat = {1: false, 2: false, 3: false, 4: false};
var rekeningTerlihat = {1: true, 2: false, 3: false};

function tambahAcara() {
    if (!acaraTerlihat[2]) {
        document.getElementById('acara-block-2').style.display = 'block';
        acaraTerlihat[2] = true;
    } else if (!acaraTerlihat[3]) {
        document.getElementById('acara-block-3').style.display = 'block';
        acaraTerlihat[3] = true;
    }
    perbaruiTombolTambah();
}

function tambahLoveStory() {
    for (var i = 1; i <= 4; i++) {
        if (!loveTerlihat[i]) {
            document.getElementById('love-story-' + i).style.display = 'block';
            loveTerlihat[i] = true;
            break;
        }
    }
    perbaruiTombolLove();
}

document.querySelectorAll('.btn-hapus-acara').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var id = this.getAttribute('data-target');
        document.getElementById(id).style.display = 'none';
        var idx = parseInt(id.replace('acara-block-', ''));
        acaraTerlihat[idx] = false;
        perbaruiTombolTambah();
    });
});

document.querySelectorAll('.btn-hapus-love').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var id = this.getAttribute('data-target');
        document.getElementById(id).style.display = 'none';
        var idx = parseInt(id.replace('love-story-', ''));
        loveTerlihat[idx] = false;
        perbaruiTombolLove();
    });
});

function perbaruiTombolTambah() {
    var btn = document.querySelector('.btn-tambah-acara');
    if (acaraTerlihat[2] && acaraTerlihat[3]) {
        btn.style.display = 'none';
    } else {
        btn.style.display = 'block';
    }
}

function perbaruiTombolLove() {
    var btn = document.querySelector('.btn-tambah-love');
    var semuaTerlihat = true;
    for (var i = 1; i <= 4; i++) {
        if (!loveTerlihat[i]) { semuaTerlihat = false; break; }
    }
    btn.style.display = semuaTerlihat ? 'none' : 'block';
}

function tambahRekening() {
    for (var i = 2; i <= 3; i++) {
        if (!rekeningTerlihat[i]) {
            document.getElementById('rekening-' + i).style.display = 'block';
            rekeningTerlihat[i] = true;
            break;
        }
    }
    perbaruiTombolRekening();
}

document.querySelectorAll('.btn-hapus-rekening').forEach(function(btn) {
    btn.addEventListener('click', function() {
        var id = this.getAttribute('data-target');
        document.getElementById(id).style.display = 'none';
        var idx = parseInt(id.replace('rekening-', ''));
        rekeningTerlihat[idx] = false;
        perbaruiTombolRekening();
    });
});

function perbaruiTombolRekening() {
    var btn = document.querySelector('.btn-tambah-rekening');
    var semua = true;
    for (var i = 1; i <= 3; i++) {
        if (!rekeningTerlihat[i]) { semua = false; break; }
    }
    btn.style.display = semua ? 'none' : 'block';
}

document.querySelectorAll('input[name="has_photo"]').forEach(function(r) {
    r.addEventListener('change', function() {
        var t = document.getElementById('totalPrice');
        var w = document.getElementById('radioWithPhoto');
        var n = document.getElementById('radioWithoutPhoto');
        var u = document.getElementById('uploadFotoSection');
        if (this.value === '1') {
            t.textContent = 'Rp109.000';
            w.classList.add('selected');
            n.classList.remove('selected');
            if (u) u.style.display = 'block';
        } else {
            t.textContent = 'Rp79.000';
            n.classList.add('selected');
            w.classList.remove('selected');
            if (u) u.style.display = 'none';
        }
    });
});

(function() {
    var u = document.getElementById('uploadFotoSection');
    var input = document.getElementById('fotoInput');
    var gallery = document.getElementById('fotoGallery');
    var err = document.getElementById('fotoError');
    var selectedFiles = [];

    if (u && document.querySelector('input[name="has_photo"]:checked')?.value === '1') {
        u.style.display = 'block';
    }

    if (input) {
        input.addEventListener('change', function() {
            err.style.display = 'none';
            var newFiles = Array.from(this.files);
            var valid = true;
            newFiles.forEach(function(f) {
                if (f.size > 1048576) {
                    err.textContent = '"' + f.name + '" melebihi 1MB.';
                    err.style.display = 'block';
                    valid = false;
                }
            });
            if (!valid) { this.value = ''; return; }
            selectedFiles = selectedFiles.concat(newFiles);
            renderGallery();
            this.value = '';
        });
    }

    window.hapusFoto = function(idx) {
        selectedFiles.splice(idx, 1);
        renderGallery();
        syncInputFiles();
    };

    function renderGallery() {
        if (!gallery) return;
        gallery.innerHTML = '';
        selectedFiles.forEach(function(f, i) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var div = document.createElement('div');
                div.style.cssText = 'position:relative;width:100px;height:100px;border-radius:8px;overflow:hidden;border:1px solid rgba(255,255,255,0.1);';
                div.innerHTML = '<img src="' + e.target.result + '" style="width:100%;height:100%;object-fit:cover;" />' +
                    '<button type="button" onclick="hapusFoto(' + i + ')" style="position:absolute;top:4px;right:4px;background:rgba(0,0,0,0.6);color:#fff;border:none;border-radius:50%;width:22px;height:22px;font-size:12px;cursor:pointer;line-height:22px;text-align:center;">&times;</button>' +
                    '<div style="position:absolute;bottom:0;left:0;right:0;background:rgba(0,0,0,0.6);font-size:0.65rem;text-align:center;padding:2px;">' + (f.size / 1024).toFixed(0) + 'KB</div>';
                gallery.appendChild(div);
            };
            reader.readAsDataURL(f);
        });
    }

    function syncInputFiles() {
        if (!input) return;
        var dt = new DataTransfer();
        selectedFiles.forEach(function(f) { dt.items.add(f); });
        input.files = dt.files;
    }
})();

document.getElementById('radioWithPhoto').classList.add('selected');
</script>

</body>
</html>
