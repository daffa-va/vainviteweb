<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Va Invite — Undangan Digital</title>

    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets/img/icon.ico')); ?>">

    <meta name="description"
        content="Va Invite — undangan digital premium untuk pernikahan, ulang tahun, aqiqah, syukuran, dan acara spesial lainnya. Desain elegan, siap sebar, harga terjangkau." />
    <meta name="keywords"
        content="undangan digital, undangan online, undangan pernikahan, undangan ulang tahun, undangan aqiqah, undangan syukuran, undangan digital murah, va invite, undangan website, undangan link" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Va Invite" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />

    <meta property="og:type" content="website" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>" />
    <meta property="og:title" content="Va Invite — Undangan Digital" />
    <meta property="og:description"
        content="Undangan digital premium untuk acara spesialmu. Desain elegan, siap sebar, harga bersahabat." />
    <meta property="og:image" content="<?php echo e(asset('assets/img/logo.jpeg')); ?>" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Va Invite — Undangan Digital" />
    <meta name="twitter:description"
        content="Undangan digital premium untuk acara spesialmu. Desain elegan, siap sebar." />
    <meta name="twitter:image" content="<?php echo e(asset('assets/img/logo.jpeg')); ?>" />

    <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "Va Invite",
  "image": "<?php echo e(asset('assets/img/logo.jpeg')); ?>",
  "description": "Penyedia undangan digital premium untuk pernikahan, ulang tahun, aqiqah, syukuran, dan acara spesial lainnya.",
  "telephone": "+6287760058673",
  "url": "<?php echo e(url('/')); ?>",
  "priceRange": "RP",
  "address": {
    "@type": "PostalAddress",
    "addressLocality": "Mataram",
    "addressRegion": "Nusa Tenggara Barat",
    "addressCountry": "ID"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "00:00",
    "closes": "23:59"
  },
  "sameAs": [
    "https://linktr.ee/VaDesignn"
  ]
}
</script>

    <link rel="stylesheet" href="<?php echo e(asset('assets/css/style.css')); ?>?v=<?php echo e(time()); ?>" />

    <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/fontawesome-free-7/css/all.min.css')); ?>" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,500&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="promo-bar" id="promoBar">
        <div class="promo-inner">
            <span class="promo-text"><span class="live-dot"></span> Promo Hari <span id="promoDay">Senin</span></span>
            <span class="promo-countdown"><span id="promoTimer">--:--:--</span></span>
        </div>
    </div>
    <nav class="navbar" id="navbar">
        <div class="nav-inner">
            <a href="#hero" class="nav-logo">
                <img src="<?php echo e(asset('assets/img/logo.jpeg')); ?>" alt="Va Invite Logo" class="logo-img" />
            </a>
            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
            <ul class="nav-links" id="navLinks">
                <li><a href="#services">Fitur</a></li>
                <li><a href="#catalog">Katalog</a></li>
                <li><a href="#pricing">Harga</a></li>
                <li><a href="#steps">Cara Order</a></li>
                <li><a href="#why">Keunggulan</a></li>
                <li><a href="<?php echo e(route('public.order.track')); ?>"><i class="fa-solid fa-search"></i> Lacak</a></li>
                <li>
                    <a href="https://wa.me/<?php echo e($whatsapp_number); ?>?text=Halo%20Va%20Invite!%20Saya%20mau%20order%20undangan%20digital%20nih%20%F0%9F%99%8F"
                        target="_blank" class="btn-nav"><i class="fa-solid fa-cart-shopping icon-spacing"></i> Order
                        Sekarang</a>
                </li>
            </ul>
            <div class="nav-overlay" id="navOverlay"></div>
        </div>
    </nav>

    <section class="hero" id="hero">
        <div class="hero-bg-grid"></div>
        <div class="hero-orb orb1"></div>
        <div class="hero-orb orb2"></div>
        <div class="hero-content">
            <div class="hero-badge reveal">
                <i class="fa-solid fa-star icon-spacing" style="color: var(--white); opacity: 0.6"></i>
Undangan Digital
            </div>
            <h1 class="hero-title reveal">
                <span class="line">Buat hari Spesial Anda</span>
                <span class="line accent-text">menjadi Lebih Spesial dengan Undangan Eksklusif</span>
            </h1>
            <p class="hero-sub reveal">
                Solusi lengkap untuk pembuatan undangan digital pernikahan, akad, ulang tahun, & acara spesialmu.<br />
                Desain elegan · Siap sebar
            </p>
            <div class="hero-devices reveal">
                <div class="device device-phone">
                    <div class="device-notch"></div>
                    <div class="device-screen">
                        <img src="<?php echo e(asset('assets/img/themes/timeless.webp')); ?>" alt="Timeless" class="device-img" />
                    </div>
                </div>
                <div class="device device-laptop">
                    <div class="device-screen">
                        <img src="<?php echo e(asset('assets/img/themes/peony.webp')); ?>" alt="Peony" class="device-img" />
                    </div>
                    <div class="device-keyboard"></div>
                </div>
                <div class="device device-phone device-alt">
                    <div class="device-notch"></div>
                    <div class="device-screen">
                        <img src="<?php echo e(asset('assets/img/themes/javanese-purple.webp')); ?>" alt="Javanese Purple" class="device-img" />
                    </div>
                </div>
            </div>
            <div class="hero-cta reveal">
                <a href="#catalog" class="btn-primary btn-catalog"><i class="fa-solid fa-images icon-spacing"></i> Lihat Katalog Tema</a>
                <a href="https://wa.me/<?php echo e($whatsapp_number); ?>?text=Halo%20Va%20Invite!%20Saya%20mau%20order%20undangan%20digital%20nih%20%F0%9F%99%8F"
                    target="_blank" class="btn-ghost"><i class="fa-solid fa-paper-plane icon-spacing"></i> Hubungi
                    Kami</a>
            </div>
            <div class="hero-stats reveal">
                <div class="stat">
                    <span class="stat-num">100+</span><span class="stat-label">Undangan Jadi</span>
                </div>
                <div class="stat-div"></div>
                <div class="stat">
                    <span class="stat-num">∞</span><span class="stat-label">Revisi Sampai Hari H</span>
                </div>
                <div class="stat-div"></div>
                <div class="stat">
                    <span class="stat-num">24h</span><span class="stat-label">Pengerjaan Cepat</span>
                </div>
            </div>
        </div>
        <div class="hero-visual">
            <div class="logo-ring">
                <img src="<?php echo e(asset('assets/img/logo.jpeg')); ?>" alt="Va Invite" class="big-logo-img" />
                <div class="ring ring1"></div>
                <div class="ring ring2"></div>
                <div class="ring ring3"></div>
            </div>
        </div>
        <div class="scroll-hint">
            <span>Scroll</span>
            <div class="scroll-line"></div>
        </div>
    </section>

    <section class="services" id="services">
        <div class="container">
            <div class="section-header reveal">
                <h2 class="section-title">
                    Fitur <span class="accent-text">ADD-On</span>
                </h2>
                <span class="section-tag">— Pilihan Fitur ADD-On Untuk Tampilan Yang Lebih Personal</span>
            </div>
            <div class="services-grid">
                <div class="service-card reveal" data-delay="0">
                    <div class="card-icon-fa">
                        <i class="fa-solid fa-palette"></i>
                    </div>
                    <h3>Ganti Tema</h3>
                    <p>
                        Ingin tema yang berbeda? Kamu bisa ganti tema undangan dengan biaya tambahan.
                    </p>
                    <span class="addon-price">Rp30.000</span>
                </div>
                <div class="service-card reveal" data-delay="100">
                    <div class="card-icon-fa">
                        <i class="fa-solid fa-language"></i>
                    </div>
                    <h3>Ganti Bahasa</h3>
                    <p>
                        Butuh undangan dalam bahasa Inggris atau lainnya? Tersedia opsi ganti bahasa.
                    </p>
                    <span class="addon-price">Rp20.000</span>
                </div>
            </div>
        </div>
    </section>

    <section class="catalog" id="catalog">
        <div class="container">
            <?php
                $themeDir = public_path('assets/img/themes');
                $fileMap = Cache::remember('theme_file_map', 3600, function () use ($themeDir) {
                    $map = [];
                    foreach (scandir($themeDir) as $f) {
                        if ($f === '.' || $f === '..') continue;
                        $map[pathinfo($f, PATHINFO_FILENAME)] = pathinfo($f, PATHINFO_EXTENSION);
                    }
                    return $map;
                });
                $cats = Cache::remember('theme_cats', 3600, function () {
                    $result = [];
                    $files = [
                        ['file'=>'themes.json','id'=>'wedding','icon'=>'fa-heart','label'=>'Wedding','nameKey'=>'nama_tema','linkKey'=>'link_preview'],
                        ['file'=>'birthday_themes.json','id'=>'birthday','icon'=>'fa-birthday-cake','label'=>'Birthday','nameKey'=>'nama_tema','linkKey'=>'link_preview'],
                        ['file'=>'umum_seminar_themes.json','id'=>'umum','icon'=>'fa-calendar-days','label'=>'Umum / Seminar','nameKey'=>'nama_tema','linkKey'=>'link_preview'],
                        ['file'=>'christmas_new_year_themes.json','id'=>'xmas','icon'=>'fa-snowflake','label'=>'Christmas & NY','nameKey'=>'nama','linkKey'=>'link'],
                        ['file'=>'aqiqah_tasmiyah.json','id'=>'aqiqah','icon'=>'fa-child','label'=>'Aqiqah & Tasmiyah','nameKey'=>'nama_tema','linkKey'=>'link_preview'],
                        ['file'=>'tema_syukuran_islami.json','id'=>'syukuran','icon'=>'fa-moon','label'=>'Syukuran & Islami','nameKey'=>'nama_tema','linkKey'=>'link_preview'],
                        ['file'=>'tema-khitan.json','id'=>'khitan','icon'=>'fa-scissors','label'=>'Tasyakuran Khitan','nameKey'=>'nama_tema','linkKey'=>'link_preview'],
                        ['file'=>'party-dinner.json','id'=>'party','icon'=>'fa-utensils','label'=>'Party & Dinner','nameKey'=>'nama_tema','linkKey'=>'link_preview'],
                        ['file'=>'tema_graduation_school.json','id'=>'school','icon'=>'fa-graduation-cap','label'=>'School & Graduation','nameKey'=>'nama_tema','linkKey'=>'link_preview'],
                    ];
                    foreach ($files as $f) {
                        $raw = json_decode(file_get_contents(base_path($f['file'])), true);
                        $themes = $raw['themes'] ?? $raw;
                        $result[] = [
                            'id'=>$f['id'],'icon'=>$f['icon'],'label'=>$f['label'],
                            'count'=>count($themes),'themes'=>$themes,
                            'nameKey'=>$f['nameKey'],'linkKey'=>$f['linkKey']
                        ];
                    }
                    return $result;
                });
                $totalThemes = array_sum(array_column($cats, 'count'));
                $catPrices = Cache::remember('cat_prices', 3600, function () use ($cats) {
                    $result = [];
                    if (!is_array($cats)) return $result;
                    foreach ($cats as $c) {
                        $dengan = \App\Models\Price::where('category', $c['label'])->where('name', 'Dengan Foto')->value('price');
                        $tanpa = \App\Models\Price::where('category', $c['label'])->where('name', 'Tanpa Foto')->value('price');
                        $result[$c['id']] = ['with' => $dengan ?: 109000, 'without' => $tanpa ?: 79000];
                    }
                    return $result;
                });
                if (!is_array($catPrices)) $catPrices = [];
                $globalMin = !empty($catPrices) ? min(array_column($catPrices, 'without')) : 79000;
            ?>
            <div class="catalog-head">
                <h3 class="catalog-head-title">Pilih Tema <span class="accent-text">Sesuai Kebutuhanmu</span></h3>
                <div style="display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
                    <span class="catalog-head-count"><?php echo e($totalThemes); ?> Tema</span>
                    <span style="color:#94a3b8;font-size:0.82rem;background:rgba(255,255,255,0.05);padding:4px 12px;border-radius:20px;">Mulai Rp<?php echo e(number_format($globalMin, 0, ',', '.')); ?></span>
                </div>
            </div>
            <div class="catalog-search">
                <i class="fa-solid fa-search"></i>
                <input type="text" id="catalogSearch" placeholder="Cari tema undangan..." autocomplete="off" />
            </div>
            <div class="catalog-tabs" id="catalogTabs">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" class="catalog-tab" data-tab="<?php echo e($cat['id']); ?>">
                        <i class="fa-solid <?php echo e($cat['icon']); ?>"></i>
                        <span class="tab-label"><?php echo e($cat['label']); ?></span>
                        <span class="tab-count"><?php echo e($cat['count']); ?></span>
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="catalog-panel" id="panel-<?php echo e($cat['id']); ?>">
                    <div class="theme-grid">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cat['themes']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tema): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $slug = substr(rtrim($tema[$cat['linkKey']],'/'), strrpos(rtrim($tema[$cat['linkKey']],'/'),'/')+1);
                                $hasImg = isset($fileMap[$slug]);
                                $color = '#'.substr(md5($slug),0,6);
                                $name = $tema[$cat['nameKey']]??'';
                                $link = $tema[$cat['linkKey']]??'';
                            ?>
                            <div class="theme-item">
                                <div class="theme-img-wrap">
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasImg): ?>
                                        <img src="<?php echo e(asset('assets/img/themes/'.$slug.'.'.$fileMap[$slug])); ?>" alt="<?php echo e($name); ?>" class="theme-img" loading="lazy" style="background:<?php echo e($color); ?>" />
                                    <?php else: ?>
                                        <div class="theme-img-placeholder" style="background:<?php echo e($color); ?>"><?php echo e($name[0]??'?'); ?></div>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                    <span style="position:absolute;bottom:8px;left:8px;background:rgba(0,0,0,0.75);color:#f59e0b;font-size:0.7rem;font-weight:600;padding:2px 8px;border-radius:4px;">Rp<?php echo e(number_format(($catPrices[$cat['id']]['without'] ?? 79000), 0, ',', '.')); ?></span>
                                    <div class="theme-overlay">
                                        <a href="<?php echo e($link); ?>" target="_blank" class="theme-overlay-btn">Lihat Contoh</a>
                                        <a href="<?php echo e(route('public.order.form', ['slug' => $slug, 'category' => $cat['label'], 'name' => $name, 'link' => $link])); ?>" class="theme-overlay-btn">
                                            <i class="fa-solid fa-cart-shopping"></i> Pesan
                                        </a>
                                    </div>
                                </div>
                                <span class="theme-label"><?php echo e($name); ?></span>
                                <a href="<?php echo e($link); ?>" target="_blank" class="theme-label-link">Lihat Contoh <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <?php $firstTheme = $cat['themes'][0] ?? null; ?>
                    <?php $firstSlug = $firstTheme ? substr(rtrim($firstTheme[$cat['linkKey']],'/'), strrpos(rtrim($firstTheme[$cat['linkKey']],'/'),'/')+1) : 'kategori-'.$cat['id']; ?>
                    <?php $firstName = $firstTheme ? ($firstTheme[$cat['nameKey']] ?? $cat['label']) : $cat['label']; ?>
                    <?php $firstLink = $firstTheme ? ($firstTheme[$cat['linkKey']] ?? '') : ''; ?>
                    <a href="<?php echo e(route('public.order.form', ['slug' => $firstSlug, 'category' => $cat['label'], 'name' => $firstName, 'link' => $firstLink])); ?>" class="btn-theme">
                        <i class="fa-solid fa-circle-dollar-to-slot icon-spacing"></i> Order via WhatsApp
                    </a>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <section class="pricing" id="pricing">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-tag">— Pricelist</span>
                <h2 class="section-title">
                    Harga yang <span class="accent-text">Terjangkau</span>
                </h2>
            </div>
            <div class="pricing-tabs" id="pricingTabs">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ci => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <button type="button" class="pricing-tab <?php echo e($ci === 0 ? 'active' : ''); ?>" data-pricing-cat="<?php echo e($cat['id']); ?>">
                        <i class="fa-solid <?php echo e($cat['icon']); ?>"></i>
                        <span><?php echo e($cat['label']); ?></span>
                    </button>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ci => $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $pc = $catPrices[$cat['id']] ?? ['with' => 109000, 'without' => 79000]; ?>
                <div class="pricing-panel <?php echo e($ci === 0 ? 'active' : ''); ?>" id="pricingPanel-<?php echo e($cat['id']); ?>">
                    <div class="price-card featured-card reveal" data-delay="0">
                        <div class="price-card-header">
                            <span class="price-icon"><i class="fa-solid <?php echo e($cat['icon']); ?>" style="color:#f59e0b"></i></span>
                            <div>
                                <h3><?php echo e($cat['label']); ?></h3>
                                <span class="price-free-barcode"><i class="fa-solid fa-qrcode"></i> Free Barcode</span>
                            </div>
                        </div>
                        <ul class="price-list">
                            <li>
                                <span class="price-item">
                                    <span class="price-item-name">Tanpa Foto</span>
                                    <span class="price-item-badge best">Hemat</span>
                                </span>
                                <span class="price-val">
                                    <span class="price-new">Rp<?php echo e(number_format((int) $pc['without'], 0, ',', '.')); ?></span>
                                </span>
                            </li>
                            <li>
                                <span class="price-item">
                                    <span class="price-item-name">Dengan Foto</span>
                                    <span class="price-item-badge best">Terlaris</span>
                                </span>
                                <span class="price-val">
                                    <span class="price-new">Rp<?php echo e(number_format((int) $pc['with'], 0, ',', '.')); ?></span>
                                </span>
                            </li>
                        </ul>
                        <div class="price-note-wrap"><i class="fa-solid fa-triangle-exclamation"></i> <strong>Penting:</strong> Tema tidak dapat di-<em>mix</em> atau ganti warna</div>
                        <a href="https://wa.me/<?php echo e($whatsapp_number); ?>?text=Halo%20Va%20Invite!%20Saya%20mau%20order%20undangan%20digital%20nih%20%F0%9F%99%8F"
                            target="_blank" class="btn-card">
                            <i class="fa-solid fa-circle-dollar-to-slot icon-spacing"></i> Order Sekarang
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    <section class="steps" id="steps">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-tag">— Cara Order</span>
                <h2 class="section-title">
                    Cara Order <span class="accent-text">Undangan Digital</span>
                </h2>
            </div>
            <div class="steps-grid">
                <div class="step-card reveal" data-delay="0">
                    <span class="step-num">1</span>
                    <div class="step-icon-fa">
                        <i class="fa-solid fa-images"></i>
                    </div>
                    <h3>Pilih Tema</h3>
                    <p>Lihat katalog tema di atas, pilih tema undangan yang paling sesuai dengan acaramu.</p>
                </div>
                <div class="step-card reveal" data-delay="100">
                    <span class="step-num">2</span>
                    <div class="step-icon-fa">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </div>
                    <h3>Isi Data</h3>
                    <p>Kirim data acara seperti nama mempelai, tanggal, lokasi, galeri foto, dan info lainnya.</p>
                </div>
                <div class="step-card reveal" data-delay="200">
                    <span class="step-num">3</span>
                    <div class="step-icon-fa">
                        <i class="fa-solid fa-whatsapp"></i>
                    </div>
                    <h3>Hubungi Kami</h3>
                    <p>Hubungi via WhatsApp untuk konsultasi, konfirmasi pesanan, dan proses pembayaran.</p>
                </div>
                <div class="step-card reveal" data-delay="300">
                    <span class="step-num">4</span>
                    <div class="step-icon-fa">
                        <i class="fa-solid fa-circle-check"></i>
                    </div>
                    <h3>Undangan Siap</h3>
                    <p>Undangan digitalmu akan selesai dalam 10&ndash;24 jam setelah data lengkap. Siap disebar!</p>
                </div>
            </div>
        </div>
    </section>

    <?php
        $defaultPrices = Cache::remember('default_prices', 3600, function () {
            $with = (int) \App\Models\Price::where('name', 'Dengan Foto')->value('price') ?: 109000;
            $without = (int) \App\Models\Price::where('name', 'Tanpa Foto')->value('price') ?: 79000;
            return ['with' => $with, 'without' => $without];
        });
        $firstCatPrices = $defaultPrices;
    ?>
    <div class="public-modal-overlay" id="publicOrderModal">
        <div class="public-modal">
            <div class="public-modal-header">
                <h3>
                    <i class="fa-solid fa-file-invoice icon-spacing"></i> Form Data
                    Pemesanan
                </h3>
                <button type="button" class="public-modal-close" id="closePublicModal">
                    ✕
                </button>
            </div>

            <form id="publicOrderForm" action="<?php echo e(route('public.order.submit')); ?>" method="POST" target="_blank">
                <?php echo csrf_field(); ?>
                <div class="public-modal-body">
                    <input type="hidden" name="theme_category" id="modalThemeCategory" value="" />
                    <input type="hidden" name="theme_name" id="modalThemeName" value="" />
                    <input type="hidden" name="theme_slug" id="modalThemeSlug" value="" />
                    <input type="hidden" name="theme_link" id="modalThemeLink" value="" />

                    <div class="public-form-group">
                        <label>Kategori Tema</label>
                        <input type="text" id="modalCategoryDisplay" class="public-form-input disabled-look" readonly />
                    </div>

                    <div class="public-form-group">
                        <label>Tema yang Dipilih</label>
                        <input type="text" id="modalThemeDisplay" class="public-form-input disabled-look" readonly />
                    </div>

                    <div class="public-form-group">
                        <label>Dengan Foto / Tanpa Foto *</label>
                        <div style="display:flex;gap:12px;margin-top:4px;">
                            <label style="display:flex;align-items:center;gap:6px;cursor:pointer;">
                                <input type="radio" name="has_photo" value="1" checked />
                                <span>Dengan Foto — Rp<?php echo e(number_format(($firstCatPrices['with'] ?? 109000), 0, ',', '.')); ?></span>
                            </label>
                            <label style="display:flex;align-items:center;gap:6px;cursor:pointer;">
                                <input type="radio" name="has_photo" value="0" />
                                <span>Tanpa Foto — Rp<?php echo e(number_format(($firstCatPrices['without'] ?? 79000), 0, ',', '.')); ?></span>
                            </label>
                        </div>
                    </div>

                    <div class="public-form-group">
                        <label for="client_name">Nama Lengkap Anda *</label>
                        <div class="public-input-icon-wrapper">
                            <i class="fa-solid fa-user input-icon"></i>
                            <input type="text" name="client_name" id="client_name" class="public-form-input"
                                placeholder="Masukkan nama panggilan / lengkap..." required />
                        </div>
                    </div>

                    <div class="public-form-group">
                        <label for="client_wa">Nomor WhatsApp Aktif *</label>
                        <div class="public-input-icon-wrapper">
                            <i class="fa-brands fa-whatsapp input-icon"></i>
                            <input type="tel" name="client_wa" id="client_wa" class="public-form-input"
                                placeholder="Contoh: 08123456789" required />
                        </div>
                        <small class="input-hint">Pastikan nomor WA aktif untuk mempermudah proses negosiasi detail
                            tugas.</small>
                    </div>
                </div>
                <div class="public-modal-footer">
                    <button type="button" class="public-btn-secondary" id="btnCancelPublicModal">Batal</button>
                    <button type="submit" class="public-btn-primary" id="btnSubmitPublicForm">
                        Lanjutkan ke WhatsApp <i class="fa-solid fa-arrow-right" style="margin-left: 6px"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <section class="why" id="why">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-tag">— Keunggulan</span>
                <h2 class="section-title">
                    Kenapa Pilih <span class="accent-text">Va Invite?</span>
                </h2>
            </div>
            <div class="why-grid">
                <div class="why-card reveal" data-delay="0">
                    <div class="why-icon-fa">
                        <i class="fa-solid fa-rotate-left"></i>
                    </div>
                    <h3>Revisi Sampai Tuntas</h3>
                    <p>
                        Tidak puas? Kami revisi tanpa batas hingga kamu benar-benar puas
                        dengan hasilnya.
                    </p>
                </div>
                <div class="why-card reveal" data-delay="100">
                    <div class="why-icon-fa">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <h3>Dikerjakan oleh Tim Ahli</h3>
                    <p>
                        Setiap undangan dirancang oleh tim desainer profesional yang
                        berpengalaman di bidangnya.
                    </p>
                </div>
                <div class="why-card reveal" data-delay="200">
                    <div class="why-icon-fa">
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <h3>Masa Aktif Undangan Selama Setahun</h3>
                    <p>
                        Undangan digitalmu bisa diakses kapan saja dalam waktu satu tahun
                        penuh tanpa khawatir kadaluarsa.
                    </p>
                </div>
                <div class="why-card reveal" data-delay="300">
                    <div class="why-icon-fa">
                        <i class="fa-solid fa-gauge-high"></i>
                    </div>
                    <h3>Pengerjaan Cepat</h3>
                    <p>
                        Deadline mepet? Tenang, kami prioritaskan kecepatan tanpa
                        mengorbankan kualitas hasil.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonials" id="testimonials">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-tag">— Testimoni</span>
                <h2 class="section-title">
                    Apa Kata <span class="accent-text">Mereka?</span>
                </h2>
            </div>
            <div class="testimonial-grid">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ti => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="testimonial-card reveal" data-delay="<?php echo e($ti * 100); ?>">
                    <div class="testimonial-stars">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php for($s = 0; $s < $t->rating; $s++): ?>
                            <i class="fa-solid fa-star"></i>
                        <?php endfor; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <p>"<?php echo e($t->content); ?>"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar"><?php echo e(substr($t->name, 0, 1)); ?></div>
                        <div>
                            <span class="testimonial-name"><?php echo e($t->name); ?></span>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($t->role): ?>
                                <span class="testimonial-role"><?php echo e($t->role); ?></span>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p style="color:#64748b;text-align:center;grid-column:1/-1;">Belum ada testimoni.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    <div class="cta-band">
        <div class="container">
            <div class="cta-band-inner reveal">
                <h2>Siap Bikin Undangan Digital Impianmu?</h2>
                <p>Hubungi kami sekarang dan dapatkan undangan digital elegan untuk acara spesialmu.</p>
                <a href="https://wa.me/<?php echo e($whatsapp_number); ?>?text=Halo%20Va%20Invite!%20Saya%20mau%20order%20undangan%20digital%20nih%20%F0%9F%99%8F" target="_blank" class="btn-primary btn-catalog">
                    <i class="fa-brands fa-whatsapp icon-spacing"></i> Order via WhatsApp
                </a>
            </div>
        </div>
    </div>

    <section class="faq" id="faq">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-tag">— FAQ</span>
                <h2 class="section-title">
                    Pertanyaan <span class="accent-text">Umum</span>
                </h2>
            </div>
            <div class="faq-list">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__empty_1 = true; $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $fi => $f): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="faq-item reveal">
                    <button class="faq-question" type="button">
                        <span><i class="fa-regular fa-circle-question" style="margin-right:10px;color:#f59e0b;"></i><?php echo e($f->question); ?></span>
                        <i class="fa-solid fa-chevron-down"></i>
                    </button>
                    <div class="faq-answer">
                        <?php echo e($f->answer); ?>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p style="color:#64748b;text-align:center;">Belum ada FAQ.</p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>
    <div class="ticker-wrap">
        <div class="ticker">
            <span>✦ Desain Elegan</span>
            <span>✦ Siap sebar</span>
            <span>✦ Harga Terjangkau</span>
            <span>✦ Pengerjaan Cepat</span>
            <span>✦ Desain Profesional</span>
            <span>✦ Desain Elegan</span>
            <span>✦ Siap sebar</span>
            <span>✦ Harga Terjangkau</span>
            <span>✦ Pengerjaan Cepat</span>
            <span>✦ Desain Profesional</span>
        </div>
    </div>

    <div class="back-to-top" id="backToTop">
        <a href="#hero" aria-label="Kembali ke atas">
            <i class="fa-solid fa-chevron-up"></i>
        </a>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-brand">
                    <img src="<?php echo e(asset('assets/img/logo.jpeg')); ?>" alt="Va Invite" class="footer-logo-img" />
                    <p>Undangan Digital<br />Terpercaya & Terjangkau</p>
                </div>
                <div class="footer-links">
                    <h4>Media Sosial</h4>
                    <ul>
                        <li><a href="<?php echo e(route('public.order.track')); ?>"><i class="fa-solid fa-search icon-spacing"></i> Lacak Pesanan</a></li>
                        <li><a href="https://www.instagram.com/va.invite" target="_blank"><i class="fa-brands fa-instagram icon-spacing"></i> Instagram</a></li>
                        <li><a href="https://www.tiktok.com/@va.invite" target="_blank"><i class="fa-brands fa-tiktok icon-spacing"></i> TikTok</a></li>
                        <li><a href="https://wa.me/<?php echo e($whatsapp_number); ?>" target="_blank"><i class="fa-brands fa-whatsapp icon-spacing"></i> WhatsApp</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Jam Operasional</h4>
                    <ul class="footer-hours">
                        <li>Senin &mdash; Minggu</li>
                        <li>07.00 &ndash; 23.00 WIB</li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Pembayaran</h4>
                    <ul class="footer-payment">
                        <li><i class="fa-solid fa-building-columns"></i> BCA — a.n. Va Invite</li>
                        <li><i class="fa-solid fa-building-columns"></i> Mandiri — a.n. Va Invite</li>
                        <li><i class="fa-solid fa-mobile-screen"></i> DANA / OVO / GoPay</li>
                    </ul>
                </div>
                <div class="footer-links">
                    <ul class="footer-address">
                        <li><strong>Va Invite</strong></li>
                        <li>Karang Taliwang, Gang Nusa Indah</li>
                        <li>Mataram, Nusa Tenggara Barat</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© <?php echo e(date('Y')); ?> Va Invite. All rights reserved.</p>
                <p>linktr.ee/VaDesignn</p>
            </div>
        </div>
    </footer>

    <a href="https://wa.me/<?php echo e($whatsapp_number); ?>?text=Halo%20Va%20Invite!%20Saya%20mau%20order%20undangan%20digital%20nih%20%F0%9F%99%8F"
        target="_blank" rel="noopener" class="wa-float" aria-label="Order via WhatsApp">
        <i class="fa-brands fa-whatsapp" style="font-size: 1.5rem"></i>
        <span class="wa-float-label">Order via WA</span>
    </a>

    <script>
    if ('scrollRestoration' in history) {
        history.scrollRestoration = 'manual';
    }
    document.addEventListener("DOMContentLoaded", function() {
        window.scrollTo(0, 0);
        // Promo countdown - reset daily
        function updatePromo() {
            var now = new Date();
            var end = new Date(now);
            end.setHours(23, 59, 59, 999);
            var diff = end - now;
            var h = Math.floor(diff / 3600000);
            var m = Math.floor((diff % 3600000) / 60000);
            var s = Math.floor((diff % 60000) / 1000);
            var days = ["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"];
            var dayEl = document.getElementById("promoDay");
            if (dayEl) dayEl.textContent = days[new Date().getDay()];
            var timer = document.getElementById("promoTimer");
            if (timer) timer.textContent =
                String(h).padStart(2,'0') + ':' +
                String(m).padStart(2,'0') + ':' +
                String(s).padStart(2,'0');
        }
        updatePromo();
        setInterval(updatePromo, 1000);

    });
    </script>
    <script src="<?php echo e(asset('assets/js/script.js')); ?>?v=<?php echo e(time()); ?>"></script>
</body>

</html>
<?php /**PATH C:\Users\ASUS\Documents\vadesign-main\resources\views\index.blade.php ENDPATH**/ ?>