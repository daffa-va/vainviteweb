@props(['active' => false, 'href' => '#'])

<a href="{{ $href }}" class="menu-item {{ $active ? 'active' : '' }}" wire:navigate>
    {{ $slot }}
</a>
