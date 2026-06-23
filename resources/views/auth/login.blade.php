<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Admin — Va Invite</title>
    <link rel="stylesheet" href="{{ asset('assets/vendor/fontawesome-free-7/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
</head>

<body>
    <div class="login-container">
        <div class="login-grid-bg"></div>

        <div class="login-box">
            <div class="login-header">
                <div class="brand-logo">
                    <i class="fa-solid fa-crown login-fa-icon"></i>
                </div>
                <h1 class="brand-title">Va Invite</h1>
                <p class="brand-tagline">
                    Masuk untuk mengelola pesanan undangan digital & sistem layanan
                </p>
            </div>

            <form id="loginForm" class="login-form" method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="input-wrapper">
                    <input type="email" id="adminEmail" name="email" placeholder="Masukkan Email Admin" required
                        autocomplete="email" value="{{ old('email') }}" />
                    <span class="input-focus-line"></span>
                </div>

                <div class="input-wrapper password-group">
                    <input type="password" id="adminPassword" name="password" placeholder="Masukkan Password Admin"
                        required autocomplete="current-password" />
                    <button type="button" id="togglePassword" class="btn-toggle-password" tabindex="-1">
                        <i class="fa-solid fa-eye" id="eyeIcon"></i>
                    </button>
                    <span class="input-focus-line"></span>
                </div>

                <div class="remember-me-container">
                    <label class="remember-me-label">
                        <input type="checkbox" name="remember" id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                        <span class="custom-checkbox"></span>
                        <span class="remember-text">Ingat akun saya di perangkat ini</span>
                    </label>
                </div>

                @if ($errors->any())
                    <div id="errorMessage" class="error-msg">
                        <i class="fa-solid fa-circle-xmark"></i> {{ $errors->first() }}
                    </div>
                @endif

                <button type="submit" class="login-btn">
                    Masuk ke Dashboard <i class="fa-solid fa-arrow-right-to-bracket icon-spacing"></i>
                </button>
            </form>
        </div>
    </div>

    <script src="{{ asset('assets/js/login.js') }}"></script>
</body>

</html>
