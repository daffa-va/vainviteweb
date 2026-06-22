<aside class="sidebar" id="sidebar">
    <div class="sidebar-brand"><span class="brand-text">VA DESIGN</span></div>
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
        </x-shared.admin.nav-item>

        <x-shared.admin.nav-item :href="route('admin.kelola-order')" :active="request()->routeIs('admin.kelola-order')">
            <span class="icon"><i class="fa-solid fa-box"></i></span>
            Kelola Order
        </x-shared.admin.nav-item>
        <x-shared.admin.nav-item :href="route('admin.edit-pricelist')" :active="request()->routeIs('admin.edit-pricelist')">
            <span class="icon"><i class="fa-solid fa-tags"></i></span>
            Edit Pricelist
        </x-shared.admin.nav-item>
        <x-shared.admin.nav-item :href="route('admin.setting')" :active="request()->routeIs('admin.setting')">
            <span class="icon"><i class="fa-solid fa-gear"></i></span>
            Pengaturan
        </x-shared.admin.nav-item>
    </nav>
    <div class="sidebar-footer">
        <form action="{{ route('admin.logout') }}" method="POST" id="logoutForm" style="display: inline;">
            @csrf
            <button type="submit" class="btn-logout"
                style="background: none; border: none; cursor: pointer; font-family: inherit;">
                <i class="fa-solid fa-right-from-bracket"></i> Keluar
            </button>
        </form>
    </div>
</aside>
