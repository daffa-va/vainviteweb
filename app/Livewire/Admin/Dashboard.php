<?php

namespace App\Livewire\Admin;


use App\Models\Order;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Title('Dashboard')]

    public function render()
    {
        // 1. Hitung jumlah order berdasarkan status masing-masing
        $pendingCount  = Order::where('status', 'pending')->count();
        $progressCount = Order::where('status', 'progress')->count();

        // 2. Hitung jumlah order berstatus 'done' dalam jangka waktu 6 bulan terakhir
        $sixMonthsAgo  = Carbon::now()->subMonths(6)->startOfDay();
        $doneCount     = Order::where('status', 'done')
            ->where('updated_at', '>=', $sixMonthsAgo)
            ->count();

        // 3. Hitung estimasi pendapatan kotor dari semua order yang sukses ('done')
        $grossRevenue  = Order::where('status', 'done')->sum('total_price');

        // 4. Ambil 5 aktivitas transaksi order terbaru untuk tabel
        $latestOrders  = Order::with('price')
            ->latest()
            ->take(5)
            ->get();

        return view('livewire.admin.dashboard', [
            'pendingCount'  => $pendingCount,
            'progressCount' => $progressCount,
            'doneCount'     => $doneCount,
            'grossRevenue'  => $grossRevenue,
            'latestOrders'  => $latestOrders,
        ])->layout('components.layouts.admin');
    }
}
