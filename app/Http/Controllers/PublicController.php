<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $admin = User::first();
        $rawWa = $admin ? $admin->whatsapp_number : config('app.whatsapp_fallback');

        // Atur No WA
        $cleanWa = preg_replace('/[^0-9]/', '', $rawWa);
        if (str_starts_with($cleanWa, '0')) {
            $cleanWa = '62' . substr($cleanWa, 1);
        }
        if (str_starts_with($cleanWa, '8')) {
            $cleanWa = '62' . $cleanWa;
        }

        // Atur Linktree
        $linktree = $admin ? $admin->linktree_url : config('app.linktree_fallback');

        $schoolServices = Price::where('category', 'Tugas Sekolah / Kuliah')->orderBy('price', 'asc')->get();
        $bannerServices = Price::where('category', 'Spanduk & Banner')->orderBy('price', 'asc')->get();
        $socialServices = Price::where('category', 'Desain Media Sosial')->orderBy('price', 'asc')->get();

        return view('index', [
            'schoolServices' => $schoolServices,
            'bannerServices' => $bannerServices,
            'socialServices' => $socialServices,
            'whatsapp_number' => $cleanWa,
            'linktree' => $linktree
        ]);
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'price_id'    => 'required|exists:prices,id',
            'client_name' => 'required|string|max:255',
            'client_wa'   => 'required|string|max:20',
        ]);

        $package = Price::findOrFail($request->price_id);

        Order::create([
            'price_id'    => $package->id,
            'client_name' => $request->client_name,
            'client_wa'   => $request->client_wa,
            'total_price' => $package->price,
            'status'      => 'pending',
            'custom_note' => 'Pemesanan mandiri dari formulir website.',
        ]);

        $admin = User::first();
        $targetWa = $admin ? $admin->whatsapp_number : config('app.whatsapp_fallback');
        $cleanWa = preg_replace('/[^0-9]/', '', $targetWa);
        if (str_starts_with($cleanWa, '0')) {
            // Hapus angka 0 di depan, lalu sambungkan dengan 62
            $cleanWa = '62' . substr($cleanWa, 1);
        }

        if (str_starts_with($cleanWa, '8')) {
            $cleanWa = '62' . $cleanWa;
        }

        $messageText = "Halo Admin Va Invite! 👋\n\n"
            . "Saya ingin memesan layanan dengan detail berikut:\n"
            . "▪️ *Nama Client:* " . $request->client_name . "\n"
            . "▪️ *No. WhatsApp:* " . $request->client_wa . "\n"
            . "▪️ *Paket Layanan:* " . $package->name . "\n"
            . "▪️ *Kategori Rumpun:* " . $package->category . "\n"
            . "▪️ *Acuan Harga Web:* Rp " . number_format($package->price, 0, ',', '.') . "\n\n"
            . "Mohon info detail pengerjaan selanjutnya ya Admin, terima kasih!";

        $encodedMessage = urlencode($messageText);

        // 6. Alihkan halaman (yang terbuka di tab baru) langsung ke WhatsApp API
        return redirect()->away("https://api.whatsapp.com/send?phone={$cleanWa}&text={$encodedMessage}");
    }
}
