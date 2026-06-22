<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? 'Dashboard' }} — Va Invite</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/icon.ico') }}">
    <x-partials.admin.css></x-partials.admin.css>
</head>

<body>
    <x-shared.admin.side-bar></x-shared.admin.side-bar>
    <div class="main">
        <x-shared.admin.top-bar></x-shared.admin.top-bar>
        {{ $slot }}
    </div>
    <x-partials.admin.js></x-partials.admin.js>
</body>

</html>
