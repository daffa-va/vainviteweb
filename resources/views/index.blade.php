<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Va Invite — Pembuatan Undangan Digital</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icon.ico') }}">

    <meta name="description"
        content="Va Invite menyediakan jasa joki tugas sekolah & kuliah (makalah, PPT Canva, poster), cetak spanduk banner, dan desain feed Instagram profesional harga terjangkau." />
    <meta name="keywords"
        content="joki tugas, jasa pembuatan makalah, joki ppt kuliah, jasa desain feed instagram, jasa desain poster, bikin spanduk murah, va invite lombok, joki tugas sekolah" />
    <meta name="robots" content="index, follow" />
    <meta name="author" content="Va Invite" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:title" content="Va Invite — Pembuatan Undangan Digital" />
    <meta property="og:description"
        content="Solusi joki tugas sekolah, kuliah, presentasi PPT, makalah, cetak spanduk, dan desain media sosial harga bersahabat." />
    <meta property="og:image" content="{{ asset('assets/img/logo.jpeg') }}" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Va Invite — Pembuatan Undangan Digital" />
    <meta name="twitter:description"
        content="Jasa pembuatan makalah, PPT Canva, spanduk, banner, poster, dan feed Instagram pengerjaan cepat." />
    <meta name="twitter:image" content="{{ asset('assets/img/logo.jpeg') }}" />

    <script type="application/ld+json">
{
  "@@context": "https://schema.org",
  "@@type": "LocalBusiness",
  "name": "Va Invite",
  "image": "{{ asset('assets/img/logo.jpeg') }}",
  "description": "Penyedia jasa joki tugas sekolah/kuliah, pembuatan makalah, PPT, desain spanduk, banner, dan manajemen konten media sosial.",
  "telephone": "+6287760058673",
  "url": "{{ url('/') }}",
  "priceRange": "RP",
  "address": {
    "@@type": "PostalAddress",
    "addressLocality": "Mataram",
    "addressRegion": "Nusa Tenggara Barat",
    "addressCountry": "ID"
  },
  "openingHoursSpecification": {
    "@@type": "OpeningHoursSpecification",
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

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free-7/css/all.min.css') }}" />
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
                <img src="{{ asset('assets/img/logo.jpeg') }}" alt="Va Invite Logo" class="logo-img" />
            </a>
            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
            <ul class="nav-links" id="navLinks">
                <li><a href="#services">Layanan</a></li>
                <li><a href="#pricing">Harga</a></li>
                <li><a href="#why">Keunggulan</a></li>
                <li>
                    <a href="https://wa.me/{{ $whatsapp_number }}?text=Halo%20VA%20Design!%20Saya%20mau%20order%20jasa%20desain%2Ftugas%20nih%20%F0%9F%99%8F"
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
Pembuatan Undangan Digital
            </div>
            <h1 class="hero-title reveal">
                <span class="line">Buat hari Spesial anda</span>
                <span class="line accent-text">menjadi Lebih Spesial dengan Undangan Eksklusif</span>
            </h1>
            <p class="hero-sub reveal">
                Solusi lengkap untuk pembuatan undangan digital pernikahan, akad, ulang tahun, & acara spesialmu.<br />
                Desain elegan · Siap sebar
            </p>
            <div class="hero-preview reveal">
                <div class="preview-imgs">
                    <img src="{{ asset('assets/img/themes/timeless.webp') }}" alt="Timeless" class="preview-img" />
                    <img src="{{ asset('assets/img/themes/peony.webp') }}" alt="Peony" class="preview-img" />
                    <img src="{{ asset('assets/img/themes/phinisi.webp') }}" alt="Phinisi" class="preview-img" />
                    <img src="{{ asset('assets/img/themes/javanese-purple.webp') }}" alt="Javanese Purple" class="preview-img" />
                    <img src="{{ asset('assets/img/themes/blue-casanova.webp') }}" alt="Blue Casanova" class="preview-img" />
                    <img src="{{ asset('assets/img/themes/kerawang-gayo.webp') }}" alt="Kerawang Gayo" class="preview-img" />
                </div>
                <span class="preview-label">+252 tema lainnya</span>
            </div>
            <div class="hero-cta reveal">
                <a href="#pricing" class="btn-primary"><i class="fa-solid fa-tags icon-spacing"></i> Lihat Pricelist</a>
                <a href="https://wa.me/{{ $whatsapp_number }}?text=Halo%20VA%20Design!%20Saya%20mau%20order%20jasa%20desain%2Ftugas%20nih%20%F0%9F%99%8F"
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
                <img src="{{ asset('assets/img/logo.jpeg') }}" alt="Va Invite" class="big-logo-img" />
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
                <span class="section-tag">— Layanan Kami</span>
                <h2 class="section-title">
                    Apa yang Bisa Kami <span class="accent-text">Bantu?</span>
                </h2>
            </div>
            <div class="services-grid">
                <div class="service-card reveal featured" data-delay="0">
                    <div class="card-badge">Populer</div>
                    <div class="card-icon-fa">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <h3>Lihat Katalog</h3>
                    <p>
                        Undangan pernikahan, akad, ulang tahun, & acara spesial lainnya —
                        desain elegan, siap sebar.
                    </p>
                    <a href="#pricing" class="card-link">Lihat Harga
                        <i class="fa-solid fa-arrow-right-long" style="margin-left: 4px"></i></a>
                </div>
            </div>
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
            <div class="pricing-grid">
                <div class="price-card reveal featured-card" data-delay="0">
                    <div class="price-card-header">
                        <span class="price-icon"><i class="fa-solid fa-envelope" style="color: #f59e0b"></i></span>
                        <div>
                            <h3>Pilih Tema Anda</h3>
                            <span class="price-free-barcode"><i class="fa-solid fa-qrcode"></i> Free Barcode</span>
                        </div>
                    </div>
                    <ul class="price-list">
                        <li>
                            <span class="price-item">Tanpa Foto</span>
                            <span class="price-val">
                                <span class="price-old">Rp109.000</span>
                                <span class="price-new">Rp79.000</span>
                            </span>
                        </li>
                        <li>
                            <span class="price-item">Dengan Foto</span>
                            <span class="price-val">
                                <span class="price-old">Rp139.000</span>
                                <span class="price-new">Rp109.000</span>
                            </span>
                        </li>
                    </ul>
                    <p class="price-note"><i class="fa-solid fa-circle-exclamation"></i> Tema tidak dapat di-<em>mix</em> atau ganti warna</p>
                    @php
                        $themesJson = json_decode(file_get_contents(base_path('themes.json')), true);
                        $birthdayThemes = json_decode(file_get_contents(base_path('birthday_themes.json')), true);
                        $umumThemes = json_decode(file_get_contents(base_path('umum_seminar_themes.json')), true);
                        $xmasRaw = json_decode(file_get_contents(base_path('christmas_new_year_themes.json')), true);
                        $xmasThemes = $xmasRaw['themes'] ?? [];
                        $aqiqahThemes = json_decode(file_get_contents(base_path('aqiqah_tasmiyah.json')), true);
                        $syukuranThemes = json_decode(file_get_contents(base_path('tema_syukuran_islami.json')), true);
                        $khitanThemes = json_decode(file_get_contents(base_path('tema-khitan.json')), true);
                        $partyThemes = json_decode(file_get_contents(base_path('party-dinner.json')), true);
                        $schoolThemes = json_decode(file_get_contents(base_path('tema_graduation_school.json')), true);
                        $themeDir = public_path('assets/img/themes');
                        $fileMap = [];
                        foreach (scandir($themeDir) as $f) {
                            if ($f === '.' || $f === '..') continue;
                            $fileMap[pathinfo($f, PATHINFO_FILENAME)] = pathinfo($f, PATHINFO_EXTENSION);
                        }
                    @endphp
                    <div class="theme-section">
                        <button type="button" class="btn-theme-toggle" id="themeToggleBtn">
                            <span class="btn-toggle-inner">
                                <i class="fa-solid fa-heart icon-spacing"></i> Wedding
                                <span class="toggle-badge">{{ count($themesJson) }} Tema</span>
                            </span>
                            <i class="fa-solid fa-chevron-down toggle-icon"></i>
                        </button>
                        <div class="theme-content" id="themeContent">
                            <div class="theme-grid">
                                @foreach($themesJson as $tema)
                                    @php
                                        $slug = substr(rtrim($tema['link_preview'], '/'), strrpos(rtrim($tema['link_preview'], '/'), '/') + 1);
                                        $hasImg = isset($fileMap[$slug]);
                                        $color = '#' . substr(md5($slug), 0, 6);
                                    @endphp
                                    <a href="{{ $tema['link_preview'] }}" target="_blank" class="theme-item">
                                        <div class="theme-img-wrap">
                                            @if($hasImg)
                                                <img src="{{ asset('assets/img/themes/'.$slug.'.'.$fileMap[$slug]) }}" alt="{{ $tema['nama_tema'] }}" class="theme-img" loading="lazy" />
                                            @else
                                                <div class="theme-img-placeholder" style="background:{{ $color }}">{{ $tema['nama_tema'][0] }}</div>
                                            @endif
                                            <div class="theme-overlay">
                                                <span class="theme-overlay-label">Lihat Tema</span>
                                            </div>
                                        </div>
                                        <span class="theme-label">{{ $tema['nama_tema'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                            <a href="https://wa.me/{{ $whatsapp_number }}?text=Halo%20Va%20Invite!%20Saya%20mau%20order%20undangan%20digital%20nih%20%F0%9F%99%8F"
                                target="_blank" class="btn-theme">
                                <i class="fa-solid fa-circle-dollar-to-slot icon-spacing"></i> Order via WhatsApp
                            </a>
                        </div>
                    </div>
                    <div class="theme-section">
                        <button type="button" class="btn-theme-toggle" id="birthdayToggleBtn">
                            <span class="btn-toggle-inner">
                                <i class="fa-solid fa-birthday-cake icon-spacing"></i> Birthday
                                <span class="toggle-badge">{{ count($birthdayThemes) }} Tema</span>
                            </span>
                            <i class="fa-solid fa-chevron-down toggle-icon"></i>
                        </button>
                        <div class="theme-content" id="birthdayContent">
                            <div class="theme-grid">
                                @foreach($birthdayThemes as $tema)
                                    @php
                                        $slug = substr(rtrim($tema['link_preview'], '/'), strrpos(rtrim($tema['link_preview'], '/'), '/') + 1);
                                        $hasImg = isset($fileMap[$slug]);
                                        $color = '#' . substr(md5($slug), 0, 6);
                                    @endphp
                                    <a href="{{ $tema['link_preview'] }}" target="_blank" class="theme-item">
                                        <div class="theme-img-wrap">
                                            @if($hasImg)
                                                <img src="{{ asset('assets/img/themes/'.$slug.'.'.$fileMap[$slug]) }}" alt="{{ $tema['nama_tema'] }}" class="theme-img" loading="lazy" />
                                            @else
                                                <div class="theme-img-placeholder" style="background:{{ $color }}">{{ $tema['nama_tema'][0] }}</div>
                                            @endif
                                            <div class="theme-overlay">
                                                <span class="theme-overlay-label">Lihat Tema</span>
                                            </div>
                                        </div>
                                        <span class="theme-label">{{ $tema['nama_tema'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="theme-section">
                        <button type="button" class="btn-theme-toggle" id="umumToggleBtn">
                            <span class="btn-toggle-inner">
                                <i class="fa-solid fa-calendar-days icon-spacing"></i> Umum / Seminar
                                <span class="toggle-badge">{{ count($umumThemes) }} Tema</span>
                            </span>
                            <i class="fa-solid fa-chevron-down toggle-icon"></i>
                        </button>
                        <div class="theme-content" id="umumContent">
                            <div class="theme-grid">
                                @foreach($umumThemes as $tema)
                                    @php
                                        $slug = substr(rtrim($tema['link_preview'], '/'), strrpos(rtrim($tema['link_preview'], '/'), '/') + 1);
                                        $hasImg = isset($fileMap[$slug]);
                                        $color = '#' . substr(md5($slug), 0, 6);
                                    @endphp
                                    <a href="{{ $tema['link_preview'] }}" target="_blank" class="theme-item">
                                        <div class="theme-img-wrap">
                                            @if($hasImg)
                                                <img src="{{ asset('assets/img/themes/'.$slug.'.'.$fileMap[$slug]) }}" alt="{{ $tema['nama_tema'] }}" class="theme-img" loading="lazy" />
                                            @else
                                                <div class="theme-img-placeholder" style="background:{{ $color }}">{{ $tema['nama_tema'][0] }}</div>
                                            @endif
                                            <div class="theme-overlay">
                                                <span class="theme-overlay-label">Lihat Tema</span>
                                            </div>
                                        </div>
                                        <span class="theme-label">{{ $tema['nama_tema'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="theme-section">
                        <button type="button" class="btn-theme-toggle" id="xmasToggleBtn">
                            <span class="btn-toggle-inner">
                                <i class="fa-solid fa-snowflake icon-spacing"></i> Christmas & New Year
                                <span class="toggle-badge">{{ count($xmasThemes) }} Tema</span>
                            </span>
                            <i class="fa-solid fa-chevron-down toggle-icon"></i>
                        </button>
                        <div class="theme-content" id="xmasContent">
                            <div class="theme-grid">
                                @foreach($xmasThemes as $tema)
                                    @php
                                        $slug = substr(rtrim($tema['link'], '/'), strrpos(rtrim($tema['link'], '/'), '/') + 1);
                                        $hasImg = isset($fileMap[$slug]);
                                        $color = '#' . substr(md5($slug), 0, 6);
                                    @endphp
                                    <a href="{{ $tema['link'] }}" target="_blank" class="theme-item">
                                        <div class="theme-img-wrap">
                                            @if($hasImg)
                                                <img src="{{ asset('assets/img/themes/'.$slug.'.'.$fileMap[$slug]) }}" alt="{{ $tema['nama'] }}" class="theme-img" loading="lazy" />
                                            @else
                                                <div class="theme-img-placeholder" style="background:{{ $color }}">{{ $tema['nama'][0] }}</div>
                                            @endif
                                            <div class="theme-overlay">
                                                <span class="theme-overlay-label">Lihat Tema</span>
                                            </div>
                                        </div>
                                        <span class="theme-label">{{ $tema['nama'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="theme-section">
                        <button type="button" class="btn-theme-toggle" id="aqiqahToggleBtn">
                            <span class="btn-toggle-inner">
                                <i class="fa-solid fa-child icon-spacing"></i> Aqiqah & Tasmiyah
                                <span class="toggle-badge">{{ count($aqiqahThemes) }} Tema</span>
                            </span>
                            <i class="fa-solid fa-chevron-down toggle-icon"></i>
                        </button>
                        <div class="theme-content" id="aqiqahContent">
                            <div class="theme-grid">
                                @foreach($aqiqahThemes as $tema)
                                    @php
                                        $slug = substr(rtrim($tema['link_preview'], '/'), strrpos(rtrim($tema['link_preview'], '/'), '/') + 1);
                                        $hasImg = isset($fileMap[$slug]);
                                        $color = '#' . substr(md5($slug), 0, 6);
                                    @endphp
                                    <a href="{{ $tema['link_preview'] }}" target="_blank" class="theme-item">
                                        <div class="theme-img-wrap">
                                            @if($hasImg)
                                                <img src="{{ asset('assets/img/themes/'.$slug.'.'.$fileMap[$slug]) }}" alt="{{ $tema['nama_tema'] }}" class="theme-img" loading="lazy" />
                                            @else
                                                <div class="theme-img-placeholder" style="background:{{ $color }}">{{ $tema['nama_tema'][0] }}</div>
                                            @endif
                                            <div class="theme-overlay">
                                                <span class="theme-overlay-label">Lihat Tema</span>
                                            </div>
                                        </div>
                                        <span class="theme-label">{{ $tema['nama_tema'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="theme-section">
                        <button type="button" class="btn-theme-toggle" id="syukuranToggleBtn">
                            <span class="btn-toggle-inner">
                                <i class="fa-solid fa-moon icon-spacing"></i> Syukuran & Islami
                                <span class="toggle-badge">{{ count($syukuranThemes) }} Tema</span>
                            </span>
                            <i class="fa-solid fa-chevron-down toggle-icon"></i>
                        </button>
                        <div class="theme-content" id="syukuranContent">
                            <div class="theme-grid">
                                @foreach($syukuranThemes as $tema)
                                    @php
                                        $slug = substr(rtrim($tema['link_preview'], '/'), strrpos(rtrim($tema['link_preview'], '/'), '/') + 1);
                                        $hasImg = isset($fileMap[$slug]);
                                        $color = '#' . substr(md5($slug), 0, 6);
                                    @endphp
                                    <a href="{{ $tema['link_preview'] }}" target="_blank" class="theme-item">
                                        <div class="theme-img-wrap">
                                            @if($hasImg)
                                                <img src="{{ asset('assets/img/themes/'.$slug.'.'.$fileMap[$slug]) }}" alt="{{ $tema['nama_tema'] }}" class="theme-img" loading="lazy" />
                                            @else
                                                <div class="theme-img-placeholder" style="background:{{ $color }}">{{ $tema['nama_tema'][0] }}</div>
                                            @endif
                                            <div class="theme-overlay">
                                                <span class="theme-overlay-label">Lihat Tema</span>
                                            </div>
                                        </div>
                                        <span class="theme-label">{{ $tema['nama_tema'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="theme-section">
                        <button type="button" class="btn-theme-toggle" id="khitanToggleBtn">
                            <span class="btn-toggle-inner">
                                <i class="fa-solid fa-scissors icon-spacing"></i> Tasyakuran Khitan
                                <span class="toggle-badge">{{ count($khitanThemes) }} Tema</span>
                            </span>
                            <i class="fa-solid fa-chevron-down toggle-icon"></i>
                        </button>
                        <div class="theme-content" id="khitanContent">
                            <div class="theme-grid">
                                @foreach($khitanThemes as $tema)
                                    @php
                                        $slug = substr(rtrim($tema['link_preview'], '/'), strrpos(rtrim($tema['link_preview'], '/'), '/') + 1);
                                        $hasImg = isset($fileMap[$slug]);
                                        $color = '#' . substr(md5($slug), 0, 6);
                                    @endphp
                                    <a href="{{ $tema['link_preview'] }}" target="_blank" class="theme-item">
                                        <div class="theme-img-wrap">
                                            @if($hasImg)
                                                <img src="{{ asset('assets/img/themes/'.$slug.'.'.$fileMap[$slug]) }}" alt="{{ $tema['nama_tema'] }}" class="theme-img" loading="lazy" />
                                            @else
                                                <div class="theme-img-placeholder" style="background:{{ $color }}">{{ $tema['nama_tema'][0] }}</div>
                                            @endif
                                            <div class="theme-overlay">
                                                <span class="theme-overlay-label">Lihat Tema</span>
                                            </div>
                                        </div>
                                        <span class="theme-label">{{ $tema['nama_tema'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="theme-section">
                        <button type="button" class="btn-theme-toggle" id="partyToggleBtn">
                            <span class="btn-toggle-inner">
                                <i class="fa-solid fa-utensils icon-spacing"></i> Party & Dinner
                                <span class="toggle-badge">{{ count($partyThemes) }} Tema</span>
                            </span>
                            <i class="fa-solid fa-chevron-down toggle-icon"></i>
                        </button>
                        <div class="theme-content" id="partyContent">
                            <div class="theme-grid">
                                @foreach($partyThemes as $tema)
                                    @php
                                        $slug = substr(rtrim($tema['link_preview'], '/'), strrpos(rtrim($tema['link_preview'], '/'), '/') + 1);
                                        $hasImg = isset($fileMap[$slug]);
                                        $color = '#' . substr(md5($slug), 0, 6);
                                    @endphp
                                    <a href="{{ $tema['link_preview'] }}" target="_blank" class="theme-item">
                                        <div class="theme-img-wrap">
                                            @if($hasImg)
                                                <img src="{{ asset('assets/img/themes/'.$slug.'.'.$fileMap[$slug]) }}" alt="{{ $tema['nama_tema'] }}" class="theme-img" loading="lazy" />
                                            @else
                                                <div class="theme-img-placeholder" style="background:{{ $color }}">{{ $tema['nama_tema'][0] }}</div>
                                            @endif
                                            <div class="theme-overlay">
                                                <span class="theme-overlay-label">Lihat Tema</span>
                                            </div>
                                        </div>
                                        <span class="theme-label">{{ $tema['nama_tema'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="theme-section">
                        <button type="button" class="btn-theme-toggle" id="schoolToggleBtn">
                            <span class="btn-toggle-inner">
                                <i class="fa-solid fa-graduation-cap icon-spacing"></i> School & Graduation
                                <span class="toggle-badge">{{ count($schoolThemes) }} Tema</span>
                            </span>
                            <i class="fa-solid fa-chevron-down toggle-icon"></i>
                        </button>
                        <div class="theme-content" id="schoolContent">
                            <div class="theme-grid">
                                @foreach($schoolThemes as $tema)
                                    @php
                                        $slug = substr(rtrim($tema['link_preview'], '/'), strrpos(rtrim($tema['link_preview'], '/'), '/') + 1);
                                        $hasImg = isset($fileMap[$slug]);
                                        $color = '#' . substr(md5($slug), 0, 6);
                                    @endphp
                                    <a href="{{ $tema['link_preview'] }}" target="_blank" class="theme-item">
                                        <div class="theme-img-wrap">
                                            @if($hasImg)
                                                <img src="{{ asset('assets/img/themes/'.$slug.'.'.$fileMap[$slug]) }}" alt="{{ $tema['nama_tema'] }}" class="theme-img" loading="lazy" />
                                            @else
                                                <div class="theme-img-placeholder" style="background:{{ $color }}">{{ $tema['nama_tema'][0] }}</div>
                                            @endif
                                            <div class="theme-overlay">
                                                <span class="theme-overlay-label">Lihat Tema</span>
                                            </div>
                                        </div>
                                        <span class="theme-label">{{ $tema['nama_tema'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <a href="https://wa.me/{{ $whatsapp_number }}?text=Halo%20Va%20Invite!%20Saya%20mau%20order%20undangan%20digital%20nih%20%F0%9F%99%8F"
                        target="_blank" class="btn-card">
                        <i class="fa-solid fa-circle-dollar-to-slot icon-spacing"></i> Order Sekarang
                    </a>
                </div>
            </div>
        </div>
    </section>

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

            <form id="publicOrderForm" action="{{ route('public.order.submit') }}" method="POST" target="_blank">
                @csrf
                <div class="public-modal-body">
                    <input type="hidden" name="price_id" id="modalPriceId" value="" />

                    <div class="public-form-group">
                        <label>Kategori yang Dipilih</label>
                        <input type="text" id="modalServiceName" class="public-form-input disabled-look" readonly
                            value="" />
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

    <section class="contact" id="contact">
        <div class="container">
            <div class="section-header reveal">
                <span class="section-tag">— Hubungi Kami</span>
                <h2 class="section-title">
                    Siap Order? <span class="accent-text">Yuk Mulai!</span>
                </h2>
                <p class="section-sub">
                    Pilih cara yang paling mudah buatmu untuk langsung order sekarang.
                </p>
            </div>

            <div class="contact-grid">
                <div class="contact-card wa-card reveal" data-delay="0">
                    <div class="contact-card-icon-fa" style="color: #25d366">
                        <i class="fa-brands fa-whatsapp"></i>
                    </div>
                    <div class="contact-card-body">
                        <h3>WhatsApp Direct</h3>
                        <p>
                            Chat langsung dengan kami di WhatsApp. Respon cepat, ramah, dan
                            siap bantu kebutuhan tugasmu!
                        </p>
                        <div class="contact-meta">
                            <span><i class="fa-solid fa-comment-dots icon-spacing"></i>
                                Biasanya balas dalam 1 jam</span>
                        </div>
                    </div>
                    <a href="https://wa.me/{{ $whatsapp_number }}?text=Halo%20VA%20Design!%20Saya%20mau%20order%20jasa%20desain%2Ftugas%20nih%20%F0%9F%99%8F"
                        target="_blank" rel="noopener" class="btn-wa">
                        <i class="fa-brands fa-whatsapp"></i> Chat via WhatsApp
                    </a>
                </div>

                <div class="contact-card lt-card reveal" data-delay="120">
                    <div class="contact-card-icon-fa" style="color: #39e09b">
                        <i class="fa-solid fa-link"></i>
                    </div>
                    <div class="contact-card-body">
                        <h3>Linktree Portofolio</h3>
                        <p>
                            Kunjungi Linktree kami untuk melihat seluruh kanal media sosial
                            dan hasil pengerjaan portofolio lengkap.
                        </p>
                        <div class="contact-meta">
                            <span><i class="fa-solid fa-globe icon-spacing"></i>
                                linktr.ee/VaDesignn</span>
                        </div>
                    </div>
                    <a href="{{ $linktree }}" target="_blank" rel="noopener" class="btn-lt">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> Buka
                        Linktree
                    </a>
                </div>
            </div>

            <p class="contact-note reveal">
                ⚡ Setelah menghubungi kami, tim Va Invite akan segera membalas dan
                memandu proses ordermu dari awal sampai selesai.
            </p>
        </div>
    </section>

    <footer class="footer">
        <div class="container">
            <div class="footer-inner">
                <div class="footer-brand">
                    <img src="{{ asset('assets/img/logo.jpeg') }}" alt="Va Invite" class="footer-logo-img" />
                    <p>Pembuatan Undangan Digital<br />Terpercaya & Terjangkau</p>
                </div>
                <div class="footer-links">
                    <h4>Layanan</h4>
                    <ul>
                        <li><a href="#pricing">Pembuatan Undangan Digital</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Kontak</h4>
                    <ul>
                        <li>
                            <a href="https://wa.me/{{ $whatsapp_number }}" target="_blank">WhatsApp</a>
                        </li>
                        <li>
                            <a href="{{ $linktree }}" target="_blank">Linktree</a>
                        </li>
                        <li><a href="#why">Keunggulan</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>© 2025 Va Invite. All rights reserved.</p>
                <p>linktr.ee/VaDesignn</p>
            </div>
        </div>
    </footer>

    <a href="https://wa.me/{{ $whatsapp_number }}?text=Halo%20VA%20Design!%20Saya%20mau%20order%20jasa%20desain%2Ftugas%20nih%20%F0%9F%99%8F"
        target="_blank" rel="noopener" class="wa-float" aria-label="Chat WhatsApp">
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
    <script src="{{ asset('assets/js/script.js') }}?v={{ time() }}"></script>
</body>

</html>
