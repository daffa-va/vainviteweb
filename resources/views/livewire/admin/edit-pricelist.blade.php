 <main class="page active">
     <div class="page-header">
         <div>
             <h1 class="page-title">Manajemen Pricelist</h1>
             <p class="page-subtitle">
                 Kelola data master kategori, paket layanan, harga, beserta ikon
                 Font Awesome.
             </p>
         </div>
         <button type="button" class="btn-primary" wire:click="openAddModal">
             <i class="fa-solid fa-circle-plus icon-spacing"></i> Tambah Paket Baru
         </button>
     </div>

     <div class="filter-bar">
         <select class="form-input" style="max-width: 250px" wire:model.live="filterCategory">
             <option value="all">Semua Kategori</option>
             <option value="Tugas Sekolah / Kuliah">Tugas Sekolah / Kuliah</option>
             <option value="Spanduk & Banner">Spanduk & Banner</option>
             <option value="Desain Media Sosial">Desain Media Sosial</option>
         </select>
     </div>

     <div class="card">
         <div class="table-wrapper">
             <table class="table">
                 <thead>
                     <tr>
                         <th>Ikon</th>
                         <th>Kategori</th>
                         <th>Nama Layanan / Paket</th>
                         <th>Harga Base</th>
                         <th>Aksi</th>
                     </tr>
                 </thead>
                 <tbody>
                     @forelse($pricelist as $item)
                         <tr>
                             <td style="text-align: center;">
                                 <i class="fa-solid {{ $item->icon }}"
                                     style="font-size: 1.1rem; color: var(--blue);"></i>
                             </td>
                             <td>{{ $item->category }}</td>
                             <td><strong>{{ $item->name }}</strong></td>
                             <td style="font-weight: 600;">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                             <td>
                                 <div class="btn-group">
                                     <button type="button" class="btn-sm btn-ghost"
                                         wire:click="openEditModal({{ $item->id }})">
                                         <i class="fa-solid fa-pen-to-square"></i> Edit
                                     </button>
                                     <button type="button" class="btn-sm btn-danger-ghost"
                                         wire:click="delete({{ $item->id }})"
                                         onclick="confirm('Yakin ingin menghapus paket harga ini?') || event.stopImmediatePropagation()">
                                         <i class="fa-solid fa-trash-can"></i> Hapus
                                     </button>
                                 </div>
                             </td>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="5" style="text-align: center; color: var(--muted); padding: 40px;">
                                 <div style="margin-bottom: 10px;">
                                     <i class="fa-solid fa-folder-open"
                                         style="font-size: 2rem; color: var(--muted);"></i>
                                 </div>
                                 <strong>Belum ada data paket layanan.</strong>
                                 <p style="font-size: 0.85rem; margin-top: 4px;">Silakan klik tombol "Tambah Paket Baru"
                                     untuk mengisi master harga.</p>
                             </td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
         </div>
     </div>

     <div class="modal-overlay {{ $isOpen ? 'show' : '' }}" id="priceModal">
         <div class="modal">
             <form wire:submit.prevent="save">
                 <div class="modal-header">
                     <h3 class="card-title" id="priceModalTitle">
                         @if ($isEdit)
                             <i class="fa-solid fa-pen-to-square icon-spacing"></i> Edit Detail Layanan
                         @else
                             <i class="fa-solid fa-circle-plus icon-spacing"></i> Tambah Layanan Baru
                         @endif
                     </h3>
                 </div>
                 <div class="modal-body">

                     <div class="form-group">
                         <label for="category">Kategori Kelompok *</label>
                         <select class="form-input" id="category" wire:model.blur="form.category">
                             <option value="Tugas Sekolah / Kuliah">Tugas Sekolah / Kuliah</option>
                             <option value="Spanduk & Banner">Spanduk & Banner</option>
                             <option value="Desain Media Sosial">Desain Media Sosial</option>
                         </select>
                         @error('category')
                             <small style="color: var(--red);">{{ $message }}</small>
                         @enderror
                     </div>

                     <div class="form-group">
                         <label for="name">Nama Layanan / Paket *</label>
                         <input type="text" class="form-input" id="name" wire:model="form.name"
                             placeholder="Contoh: Canva 10–20 slide" required />
                         @error('name')
                             <small style="color: var(--red);">{{ $message }}</small>
                         @enderror
                     </div>

                     <div class="form-group">
                         <label for="price">Harga Layanan (Rupiah) *</label>
                         <input type="number" class="form-input" id="price" wire:model="form.price"
                             placeholder="Contoh: 15000" required />
                         @error('price')
                             <small style="color: var(--red);">{{ $message }}</small>
                         @enderror
                     </div>

                     <div
                         style="background: rgba(255,255,255,0.02); border: 1px dashed var(--border); padding: 12px; border-radius: 8px; font-size: 0.8rem; color: var(--muted); display: flex; align-items: center; gap: 10px;">
                         <i class="fa-solid fa-circle-info" style="color: var(--blue); font-size: 1rem;"></i>
                         <span>Sistem otomatis memasangkan ikon Font Awesome berdasarkan kategori kelompok pilihan
                             Anda.</span>
                     </div>

                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn-ghost" wire:click="closeModal">Batal</button>
                     <button type="submit" class="btn-primary"
                         style="background: var(--blue); color: white; border-color: var(--blue);">
                         {{ $isEdit ? 'Perbarui Data' : 'Simpan Paket' }}
                     </button>
                 </div>
             </form>
         </div>
     </div>
 </main>
