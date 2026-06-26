<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form Pemesanan — Va Invite</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/icon.ico')); ?>">
    <meta name="robots" content="noindex, nofollow" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;500;600;700;800&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fontawesome-free-7/css/all.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/order-form.css')); ?>" />
</head>

<body>

<div class="form-page">
    <a href="<?php echo e(url('/')); ?>#catalog" class="back-link">
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
                <span class="summary-value"><?php echo e($category); ?></span>
            </div>
            <div class="summary-row">
                <span class="summary-label">Tema</span>
                <span class="summary-value"><?php echo e($themeName); ?></span>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($themeLink): ?>
            <div class="summary-row">
                <span class="summary-label">Preview</span>
                <a href="<?php echo e($themeLink); ?>" target="_blank" class="summary-link">Lihat Contoh <i class="fa-solid fa-arrow-up-right-from-square" style="font-size:0.7rem;"></i></a>
            </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

    <form action="<?php echo e(route('public.order.submit')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="theme_category" value="<?php echo e($category); ?>">
        <input type="hidden" name="theme_name" value="<?php echo e($themeName); ?>">
        <input type="hidden" name="theme_slug" value="<?php echo e($slug); ?>">
        <input type="hidden" name="theme_link" value="<?php echo e($themeLink); ?>">

        
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
                        <label class="form-label">Nama Acara 2</label>
                        <input type="text" name="acara_nama_2" class="form-input" placeholder="Cth: Resepsi" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Acara 2</label>
                        <input type="date" name="acara_tanggal_2" class="form-input" />
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
                        <label class="form-label">Nama Acara 3</label>
                        <input type="text" name="acara_nama_3" class="form-input" placeholder="Cth: Ngunduh Mantu" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Tanggal Acara 3</label>
                        <input type="date" name="acara_tanggal_3" class="form-input" />
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

        
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-gift"></i> Kado Digital / Amplop Online</div>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($ri = 1; $ri <= 3; $ri++): ?>
            <div class="rekening-block" id="rekening-<?php echo e($ri); ?>" style="<?php echo e($ri > 1 ? 'display:none;' : 'display:block;'); ?>background:#111;border:1px solid rgba(255,255,255,0.06);border-radius:12px;padding:18px;margin-bottom:14px;">
                <h4 style="font-size:0.9rem;font-weight:600;margin-bottom:12px;color:#f59e0b;">
                    Rekening <?php echo e($ri); ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($ri > 1): ?>
                    <button type="button" class="btn-hapus-rekening" data-target="rekening-<?php echo e($ri); ?>" style="float:right;background:none;border:1px solid rgba(255,255,255,0.15);color:#999;border-radius:6px;padding:2px 10px;font-size:0.78rem;cursor:pointer;">Hapus</button>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </h4>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Nama Bank</label>
                        <input type="text" name="kado_digital_bank_<?php echo e($ri); ?>" class="form-input" placeholder="Cth: BCA, Mandiri, BRI" />
                    </div>
                    <div class="form-group">
                        <label class="form-label">Atas Nama</label>
                        <input type="text" name="kado_digital_an_<?php echo e($ri); ?>" class="form-input" placeholder="Cth: Nama Pemilik" />
                    </div>
                </div>
                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label">No. Rekening</label>
                    <input type="text" name="kado_digital_norek_<?php echo e($ri); ?>" class="form-input" placeholder="Cth: 1234567890" />
                </div>
            </div>
            <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <div style="margin-top:6px;">
                <button type="button" class="btn-tambah-rekening" onclick="tambahRekening()" style="background:none;border:1px dashed rgba(255,255,255,0.2);color:#f59e0b;padding:10px 20px;border-radius:10px;cursor:pointer;font-size:0.85rem;width:100%;">
                    <i class="fa-solid fa-plus"></i> Tambah Rekening
                </button>
            </div>
        </div>

        
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

        
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-people"></i> Turut Mengundang</div>
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label">Nama Keluarga / Pihak yang Turut Mengundang</label>
                <textarea name="turut_mengundang" class="form-input form-textarea" placeholder="Cth: Keluarga Besar Bpk. Contoh & Ibu Contoh&#10;Keluarga Besar Bpk. Contoh & Ibu Contoh"></textarea>
                <div style="font-size:0.75rem;color:#666;margin-top:4px;">Pisahkan dengan baris baru jika lebih dari satu.</div>
            </div>
        </div>

        
        <div class="card">
            <div class="card-title"><i class="fa-solid fa-tag"></i> Opsi & Harga</div>
            <div class="form-group">
                <label class="form-label">Catatan Khusus (opsional)</label>
                <textarea name="custom_note" class="form-input form-textarea" placeholder="Cth: Tema warna favorit, instruksi desain, permintaan khusus..."></textarea>
            </div>
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label">Opsi Undangan <span class="required">*</span></label>
                <div class="radio-group">
                    <label class="radio-card" id="radioWithPhoto">
                        <input type="radio" name="has_photo" value="1" checked />
                        <div class="radio-info">
                            <span class="radio-name">Dengan Foto</span>
                            <span class="radio-price">Rp<?php echo e(number_format($priceWith, 0, ',', '.')); ?></span>
                        </div>
                    </label>
                    <label class="radio-card" id="radioWithoutPhoto">
                        <input type="radio" name="has_photo" value="0" />
                        <div class="radio-info">
                            <span class="radio-name">Tanpa Foto</span>
                            <span class="radio-price">Rp<?php echo e(number_format($priceWithout, 0, ',', '.')); ?></span>
                        </div>
                    </label>
                </div>
            </div>
            <div class="total-row">
                <span class="total-label">Total Harga</span>
                <span class="total-price" id="totalPrice">Rp<?php echo e(number_format($priceWith, 0, ',', '.')); ?></span>
            </div>
        </div>

        
        <div class="card" id="uploadFotoSection" style="display:none;">
            <div class="card-title"><i class="fa-solid fa-images"></i> Upload Foto</div>
            <div style="font-size:0.82rem;color:#666;margin-bottom:10px;">Upload foto pasangan (max 1MB per file)</div>
            <div class="form-group" style="margin-bottom:0;">
                <label class="form-label">Pilih Foto (max 1MB per file)</label>
                <input type="file" name="fotos[]" multiple accept="image/*" id="fotoInput" class="form-input" style="padding:10px;font-size:0.82rem;" />
                <div style="font-size:0.75rem;color:#666;margin-top:3px;">Format: JPG, PNG, WEBP. Maks 1MB per file.</div>
                <div id="fotoError" style="color:#ef4444;font-size:0.82rem;display:none;margin-top:6px;"></div>
            </div>
            <div id="fotoGallery" style="display:flex;gap:10px;flex-wrap:wrap;margin-top:12px;"></div>
        </div>

        <button type="submit" class="btn-submit" id="submitBtn">
            <i class="fa-solid fa-paper-plane"></i> <span id="submitText">Kirim Pesanan</span>
        </button>
    </form>

    <div class="wa-fallback">
        Atau hubungi langsung via <a href="https://wa.me/<?php echo e($whatsapp_number); ?>" target="_blank">WhatsApp <i class="fa-brands fa-whatsapp"></i></a>
    </div>
</div>

<script>
var acaraTerlihat = {2: false, 3: false};
var loveTerlihat = {1: false, 2: false, 3: false, 4: false};
var rekeningTerlihat = {1: true, 2: false, 3: false};

// Konfirmasi sebelum submit
document.querySelector('form').addEventListener('submit', function(e) {
    if (!confirm('Yakin ingin mengirim pesanan? Pastikan semua data sudah benar.')) {
        e.preventDefault();
        return;
    }
    var btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.classList.add('btn-loading');
    document.getElementById('submitText').textContent = 'Mengirim...';
});

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
            t.textContent = 'Rp<?php echo e(number_format($priceWith, 0, ',', '.')); ?>';
            w.classList.add('selected');
            n.classList.remove('selected');
            if (u) u.style.display = 'block';
        } else {
            t.textContent = 'Rp<?php echo e(number_format($priceWithout, 0, ',', '.')); ?>';
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
            reader.onerror = function() {
                err.textContent = 'Gagal membaca file: ' + f.name;
                err.style.display = 'block';
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
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\order-form.blade.php ENDPATH**/ ?>