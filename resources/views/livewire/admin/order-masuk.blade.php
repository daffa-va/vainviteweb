 <main class="page active">
     <div class="page-header">
         <div>
             <h1 class="page-title">Order Masuk (Antrean)</h1>
             <p class="page-subtitle">
                 Daftar orderan otomatis dari halaman publik yang memerlukan
                 verifikasi kesepakatan.
             </p>
         </div>
     </div>

     <div class="card">
         <div class="table-wrapper">
             <table class="table">
                 <thead>
                     <tr>
                         <th>Tanggal</th>
                         <th>Nama Client</th>
                         <th>No. WhatsApp</th>
                         <th>Paket Pilihan</th>
                         <th>Status</th>
                         <th>Aksi Verifikasi</th>
                     </tr>
                 </thead>
                 <tbody>
                     @forelse($orders as $order)
                         <tr>
                             <td>{{ $order->created_at->format('d/m/Y') }}</td>
                             <td><strong>{{ $order->client_name }}</strong></td>
                             <td>{{ $order->client_wa }}</td>
                             <td>
                                 @if ($order->price)
                                     <span class="badge badge-progress"><i
                                             class="fa-solid {{ $order->price->icon }} icon-spacing"></i>
                                         {{ $order->price->category }}</span>
                                 @else
                                     <span class="badge badge-cancelled">Paket Dihapus</span>
                                 @endif
                             </td>
                             <td>
                                 <span class="badge badge-pending"><i
                                         class="fa-solid fa-hourglass-half icon-spacing"></i> Menunggu</span>
                             </td>
                             <td>
                                 <div class="btn-group">
                                     <button type="button" class="btn-sm btn-ghost"
                                         wire:click="openAcceptModal({{ $order->id }})"
                                         style="border-color: var(--green); color: #4ade80">
                                         <i class="fa-solid fa-circle-check"></i> Accept
                                     </button>
                                     <button type="button" class="btn-sm btn-danger-ghost"
                                         wire:click="openCancelModal({{ $order->id }})">
                                         <i class="fa-solid fa-circle-xmark"></i> Cancel
                                     </button>
                                 </div>
                             </td>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="6" style="text-align: center; color: var(--muted); padding: 40px;">
                                 <div style="margin-bottom: 10px;">
                                     <i class="fa-solid fa-bell-slashed"
                                         style="font-size: 2rem; color: var(--muted);"></i>
                                 </div>
                                 <strong>Kotak antrean order masuk kosong.</strong>
                                 <p style="font-size: 0.85rem; margin-top: 4px;">Belum ada pelanggan baru yang melakukan
                                     pemesanan via landing page publik.</p>
                             </td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
         </div>
     </div>

     <div class="modal-overlay {{ $isOpenAccept ? 'show' : '' }}" id="verificationModal">
         <div class="modal">
             <form wire:submit.prevent="moveToProgress">
                 <div class="modal-header">
                     <h3 class="card-title"><i class="fa-solid fa-file-shield icon-spacing"></i> Form Verifikasi Data
                         Project</h3>
                 </div>
                 <div class="modal-body">
                     <div class="form-group">
                         <label>Nama Lengkap Client</label>
                         <input type="text" class="form-input read-only-look" wire:model="form.clientName"
                             readonly />
                     </div>

                     <div class="form-group">
                         <label>Nomor WhatsApp</label>
                         <input type="text" class="form-input read-only-look" wire:model="form.clientWa" readonly />
                     </div>

                     <div class="form-group">
                         <label for="verificationPriceId">Detail Paket Layanan Akhir *</label>
                         <select class="form-input" id="verificationPriceId" wire:model="form.priceId" required>
                             @foreach ($availableServices as $service)
                                 <option value="{{ $service->id }}">
                                     {{ $service->name }} (Acuan Web: Rp
                                     {{ number_format($service->price, 0, ',', '.') }})
                                 </option>
                             @endforeach
                         </select>
                         @error('form.priceId')
                             <small style="color: var(--red);">{{ $message }}</small>
                         @enderror
                     </div>

                     <div class="form-group">
                         <label for="totalPrice">Harga Deal Akhir (Negosiasi WA) *</label>
                         <input type="number" class="form-input" id="totalPrice" wire:model="form.totalPrice"
                             placeholder="Masukkan harga kesepakatan akhir..." />
                         @error('form.totalPrice')
                             <small style="color: var(--red);">{{ $message }}</small>
                         @enderror
                     </div>

                     <div class="form-group">
                         <label for="customNote">Catatan Tambahan Spesifikasi Order</label>
                         <textarea class="form-input" id="customNote" wire:model="form.customNote"
                             placeholder="Tulis catatan pengerjaan kustom di sini..." rows="3"></textarea>
                         @error('form.customNote')
                             <small style="color: var(--red);">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn-ghost" wire:click="closeModal">Batal</button>
                     <button type="submit" class="btn-primary"
                         style="background: var(--green); color: black; font-weight:600;">
                         Pindahkan ke Progress
                     </button>
                 </div>
             </form>
         </div>
     </div>

     <div class="modal-overlay {{ $isOpenCancel ? 'show' : '' }}" id="cancelConfirmModal">
         <div class="modal" style="max-width: 400px;">
             <div class="modal-header">
                 <h3 class="card-title" style="color: var(--red);"><i
                         class="fa-solid fa-triangle-exclamation icon-spacing"></i> Batalkan Order</h3>
             </div>
             <div class="modal-body">
                 <p>Apakah Anda yakin ingin membatalkan dan menghapus antrean pesanan dari
                     <strong>{{ $cancelTargetName }}</strong>?
                 </p>
             </div>
             <div class="modal-footer">
                 <button type="button" class="btn-ghost" wire:click="closeModal">Kembali</button>
                 <button type="button" class="btn-primary" wire:click="confirmCancel"
                     style="background: var(--red); color: white">
                     Ya, Hapus Antrean
                 </button>
             </div>
         </div>
     </div>
 </main>
