<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand"><span class="brand-text">Va Invite</span></div>
    <nav class="sidebar-menu">
        <x-shared.admin.nav-item :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
            <span class="icon">
                <i class="fa-solid fa-chart-simple"></i>
            </span> Dashboard
        </x-shared.admin.nav-item>
        <x-shared.admin.nav-item :href="route('admin.order-masuk')" :active="request()->routeIs('admin.order-masuk')">
            <span class="icon">
                <i class="fa-solid fa-bell"></i>
            </span>
            Order Masuk
            @php $pendingCount = \App\Models\Order::where('status', 'pending')->count(); @endphp
            @if($pendingCount > 0)
                <span class="badge badge-progress" style="margin-left:auto;font-size:0.65rem;padding:1px 8px;">{{ $pendingCount }}</span>
            @endif
        </x-shared.admin.nav-item>

        <x-shared.admin.nav-item :href="route('admin.kelola-order')" :active="request()->routeIs('admin.kelola-order')">
            <span class="icon"><i class="fa-solid fa-box"></i></span>
            Kelola Order
        </x-shared.admin.nav-item>

        @if(auth()->user()?->role === 'admin')
        <x-shared.admin.nav-item :href="route('admin.edit-pricelist')" :active="request()->routeIs('admin.edit-pricelist')">
            <span class="icon"><i class="fa-solid fa-tags"></i></span>
            Edit Pricelist
        </x-shared.admin.nav-item>
        <x-shared.admin.nav-item :href="route('admin.activity-logs')" :active="request()->routeIs('admin.activity-logs')">
            <span class="icon"><i class="fa-solid fa-history"></i></span>
            Activity Logs
        </x-shared.admin.nav-item>
        <x-shared.admin.nav-item :href="route('admin.setting')" :active="request()->routeIs('admin.setting')">
            <span class="icon"><i class="fa-solid fa-gear"></i></span>
            Pengaturan
        </x-shared.admin.nav-item>
        @endif
    </nav>
    <div class="sidebar-footer">
        <div style="padding:8px 16px;font-size:0.75rem;color:var(--muted);border-bottom:1px solid var(--border);margin-bottom:8px;">
            <i class="fa-solid fa-user"></i> {{ auth()->user()?->name ?? 'User' }}
            <span class="badge badge-progress" style="font-size:0.6rem;margin-left:4px;">{{ auth()->user()?->role ?? '?' }}</span>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm" style="display: inline;">
            @csrf
            <button type="submit" class="btn-logout"
                style="background: none; border: none; cursor: pointer; font-family: inherit;">
                <i class="fa-solid fa-right-from-bracket"></i> Keluar
            </button>
        </form>
    </div>
</aside>
