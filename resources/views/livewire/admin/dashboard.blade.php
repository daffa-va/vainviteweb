 <main class="page">
     <div class="page-header">
         <div>
             <h1 class="page-title">Ringkasan Sistem</h1>
             <p class="page-subtitle">
                 Statistik performa penjualan dan pengerjaan tugas saat ini.
             </p>
         </div>
     </div>

     <div class="stats-grid">
         <div class="stat-card">
             <div class="stat-label">⏳ Menunggu Konfirmasi</div>
             <div class="stat-num">
                 {{ $pendingCount }} <span class="stat-unit">order</span>
             </div>
         </div>
         <div class="stat-card">
             <div class="stat-label">🔄 Sedang Dikerjakan</div>
             <div class="stat-num">
                 {{ $progressCount }} <span class="stat-unit">order</span>
             </div>
         </div>
         <div class="stat-card">
             <div class="stat-label">✅ Selesai (6 Bulan Terakhir)</div>
             <div class="stat-num">
                 {{ $doneCount }} <span class="stat-unit">order</span>
             </div>
         </div>
         <div class="stat-card wide">
             <div class="stat-label">💰 Estimasi Pendapatan Kotor</div>
             <div class="stat-num" style="color: #22c55e">
                 Rp {{ number_format($grossRevenue, 0, ',', '.') }}
             </div>
         </div>
     </div>

     <div class="card" style="margin-top: 24px">
         <div class="card-header">
             <h2 class="card-title">Aktivitas Terakhir</h2>
         </div>
         <div class="table-wrapper">
             <table class="table">
                 <thead>
                     <tr>
                         <th>Pelanggan</th>
                         <th>Layanan</th>
                         <th>Harga</th>
                         <th>Status</th>
                     </tr>
                 </thead>
                 <tbody>
                     {{-- <tr>
                         <td>
                             <strong>Andi Wijaya</strong><br /><small style="color: #777">08123456789</small>
                         </td>
                         <td>Canva 10–20 slide</td>
                         <td>Rp 15.000</td>
                         <td>
                             <span class="badge badge-progress"><i class="fa-solid fa-spinner fa-spin icon-spacing"></i>
                                 Dikerjakan</span>
                         </td>
                     </tr>
                     <tr>
                         <td>
                             <strong>Siti Rahma</strong><br /><small style="color: #777">08987654321</small>
                         </td>
                         <td>Spanduk detail</td>
                         <td>Rp 25.000</td>
                         <td>
                             <span class="badge badge-pending"><i class="fa-solid fa-hourglass-half icon-spacing"></i>
                                 Menunggu</span>
                         </td>
                     </tr>
                     <tr>
                         <td>
                             <strong>Rian Hidayat</strong><br /><small style="color: #777">085211223344</small>
                         </td>
                         <td>Makalah + daftar isi rapi</td>
                         <td>Rp 15.000</td>
                         <td>
                             <span class="badge badge-done"><i class="fa-solid fa-circle-check icon-spacing"></i>
                                 Selesai</span>
                         </td>
                     </tr> --}}

                     @forelse($latestOrders as $order)
                         <tr>
                             <td>
                                 <strong>{{ $order->client_name }}</strong><br />
                                 <small style="color: var(--muted)">{{ $order->client_wa }}</small>
                             </td>
                             <td>
                                 @if ($order->price)
                                     {{ $order->price->name }} <small
                                         style="color: var(--blue)">({{ $order->price->category }})</small>
                                 @else
                                     <span style="color: var(--red)">Layanan Dihapus</span>
                                 @endif
                             </td>
                             <td style="font-weight: 600;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                             <td>
                                 @if ($order->status === 'pending')
                                     <span class="badge badge-pending"><i
                                             class="fa-solid fa-hourglass-half icon-spacing"></i> Menunggu</span>
                                 @elseif($order->status === 'progress')
                                     <span class="badge badge-progress"><i
                                             class="fa-solid fa-spinner fa-spin icon-spacing"></i> Dikerjakan</span>
                                 @else
                                     <span class="badge badge-done"><i
                                             class="fa-solid fa-circle-check icon-spacing"></i> Selesai</span>
                                 @endif
                             </td>
                         </tr>
                     @empty
                         <tr>
                             <td colspan="4" style="text-align: center; color: var(--muted); padding: 30px;">
                                 Belum ada aktivitas transaksi terekam di sistem.
                             </td>
                         </tr>
                     @endforelse
                 </tbody>
             </table>
         </div>
     </div>
 </main>
