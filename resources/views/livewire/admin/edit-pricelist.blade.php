<main class="page">
    <div class="page-header">
        <div>
            <h1 class="page-title">Daftar Harga</h1>
            <p class="page-subtitle">
                Harga mengikuti katalog: Dengan Foto Rp109.000 & Tanpa Foto Rp79.000 per kategori.
            </p>
        </div>
    </div>

    <div class="card">
        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th>Ikon</th>
                        <th>Kategori</th>
                        <th>Dengan Foto</th>
                        <th>Tanpa Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                        @php $items = $pricelist->get($cat, collect()); @endphp
                        @php $dengan = $items->firstWhere('name', 'Dengan Foto'); @endphp
                        @php $tanpa = $items->firstWhere('name', 'Tanpa Foto'); @endphp
                        <tr>
                            <td style="text-align:center;">
                                <i class="fa-solid {{ $dengan?->icon ?? 'fa-tags' }}" style="font-size:1.1rem;color:var(--amber);"></i>
                            </td>
                            <td><strong>{{ $cat }}</strong></td>
                            <td>
                                @if ($dengan)
                                    @if ($editingId === $dengan->id)
                                        <form wire:submit="savePrice({{ $dengan->id }})" style="display:flex;gap:4px;align-items:center;">
                                            <input type="number" class="form-input" style="width:130px;padding:4px 8px;font-size:0.85rem;" wire:model="editPrice" />
                                            <button type="submit" class="btn-sm btn-ghost" style="padding:4px 8px;font-size:0.75rem;">Simpan</button>
                                            <button type="button" class="btn-sm btn-danger-ghost" style="padding:4px 8px;font-size:0.75rem;" wire:click="cancelEdit">Batal</button>
                                        </form>
                                    @else
                                        Rp {{ number_format($dengan->price, 0, ',', '.') }}
                                        <button type="button" class="btn-sm btn-ghost" style="padding:2px 8px;font-size:0.7rem;margin-left:4px;" wire:click="startEdit({{ $dengan->id }})">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    @endif
                                @else
                                    <span style="color:var(--muted);font-style:italic;">-</span>
                                @endif
                            </td>
                            <td>
                                @if ($tanpa)
                                    @if ($editingId === $tanpa->id)
                                        <form wire:submit="savePrice({{ $tanpa->id }})" style="display:flex;gap:4px;align-items:center;">
                                            <input type="number" class="form-input" style="width:130px;padding:4px 8px;font-size:0.85rem;" wire:model="editPrice" />
                                            <button type="submit" class="btn-sm btn-ghost" style="padding:4px 8px;font-size:0.75rem;">Simpan</button>
                                            <button type="button" class="btn-sm btn-danger-ghost" style="padding:4px 8px;font-size:0.75rem;" wire:click="cancelEdit">Batal</button>
                                        </form>
                                    @else
                                        Rp {{ number_format($tanpa->price, 0, ',', '.') }}
                                        <button type="button" class="btn-sm btn-ghost" style="padding:2px 8px;font-size:0.7rem;margin-left:4px;" wire:click="startEdit({{ $tanpa->id }})">
                                            <i class="fa-solid fa-pen"></i>
                                        </button>
                                    @endif
                                @else
                                    <span style="color:var(--muted);font-style:italic;">-</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" style="text-align:center;color:var(--muted);padding:40px;">
                                <strong>Tidak ada data.</strong>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
