<?php

namespace App\Http\Controllers;

use App\Models\Price;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PublicController extends Controller
{
    public function index()
    {
        $admin = User::first();
        $linktree = $admin ? $admin->linktree_url : config('app.linktree_fallback');

        return view('index', [
            'whatsapp_number' => $this->formatWaNumber($admin?->whatsapp_number ?? config('app.whatsapp_fallback')),
            'linktree' => $linktree
        ]);
    }

    public function orderTheme(Request $request, $slug)
    {
        $themeName = $request->query('name', $slug);
        $themeCategory = $request->query('category', 'Umum');
        $themeLink = $request->query('link', '');

        Order::create([
            'price_id'       => null,
            'client_name'    => null,
            'client_wa'      => null,
            'total_price'    => null,
            'status'         => 'pending',
            'custom_note'    => "Minat tema via WhatsApp",
            'theme_slug'     => $slug,
            'theme_name'     => $themeName,
            'theme_category' => $themeCategory,
            'theme_link'     => $themeLink,
        ]);

        $admin = User::first();
        $cleanWa = $this->formatWaNumber($admin?->whatsapp_number ?? config('app.whatsapp_fallback'));

        $messageText = "Halo Va Invite! 👋\n\n"
            . "Saya tertarik dengan tema undangan berikut:\n"
            . "▪️ *Tema:* " . $themeName . "\n"
            . "▪️ *Kategori:* " . $themeCategory . "\n"
            . "▪️ *Link Preview:* " . $themeLink . "\n\n"
            . "Saya mau order undangan digital ini. Mohon info selanjutnya ya!";

        $encodedMessage = urlencode($messageText);

        $waUrl = "https://api.whatsapp.com/send?phone={$cleanWa}&text={$encodedMessage}";

        return redirect()->route('public.order.confirmation', ['wa_url' => urlencode($waUrl)]);
    }

    public function orderForm(Request $request, $slug)
    {
        $themeName = $request->query('name', $slug);
        $themeCategory = $request->query('category', 'Umum');
        $themeLink = $request->query('link', '');

        $admin = User::first();
        $cleanWa = $this->formatWaNumber($admin?->whatsapp_number ?? config('app.whatsapp_fallback'));

        $priceWith = Price::where('category', $themeCategory)->where('name', 'Dengan Foto')->value('price') ?? 109000;
        $priceWithout = Price::where('category', $themeCategory)->where('name', 'Tanpa Foto')->value('price') ?? 79000;

        return view('order-form', [
            'slug'            => $slug,
            'category'        => $themeCategory,
            'themeName'       => $themeName,
            'themeLink'       => $themeLink,
            'whatsapp_number' => $cleanWa,
            'priceWith'       => $priceWith,
            'priceWithout'    => $priceWithout,
        ]);
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'theme_category'          => 'required|string|max:255',
            'theme_name'              => 'required|string|max:255',
            'theme_slug'              => 'nullable|string|max:255',
            'theme_link'              => 'nullable|string',
            'has_photo'               => 'required|in:0,1',
            'client_name'             => 'required|string|max:255',
            'client_wa'               => 'required|string|min:10|max:15|regex:/^[0-9]+$/',
            'data_mempelai_pria_panggilan'   => 'nullable|string|max:255',
            'data_mempelai_wanita_panggilan' => 'nullable|string|max:255',
            'data_mempelai_pria_lengkap'     => 'nullable|string|max:255',
            'data_mempelai_wanita_lengkap'   => 'nullable|string|max:255',
            'data_mempelai_ortu_pria'        => 'nullable|string|max:255',
            'data_mempelai_ortu_wanita'      => 'nullable|string|max:255',
            'acara_nama_1'            => 'required_with:acara_tanggal_1|nullable|string|max:255',
            'acara_tanggal_1'         => 'required_with:acara_nama_1|nullable|date|after_or_equal:today',
            'acara_waktu_1'           => 'nullable|string|max:10',
            'acara_waktu_selesai_1'   => 'nullable|string|max:10',
            'acara_zona_1'            => 'nullable|string|max:10',
            'acara_lokasi_1'          => 'nullable|string|max:255',
            'acara_alamat_1'          => 'nullable|string',
            'acara_maps_1'            => 'nullable|string|max:500',
            'acara_nama_2'            => 'nullable|string|max:255',
            'acara_tanggal_2'         => 'nullable|date',
            'acara_waktu_2'           => 'nullable|string|max:10',
            'acara_waktu_selesai_2'   => 'nullable|string|max:10',
            'acara_zona_2'            => 'nullable|string|max:10',
            'acara_lokasi_2'          => 'nullable|string|max:255',
            'acara_alamat_2'          => 'nullable|string',
            'acara_maps_2'            => 'nullable|string|max:500',
            'acara_nama_3'            => 'nullable|string|max:255',
            'acara_tanggal_3'         => 'nullable|date',
            'acara_waktu_3'           => 'nullable|string|max:10',
            'acara_waktu_selesai_3'   => 'nullable|string|max:10',
            'acara_zona_3'            => 'nullable|string|max:10',
            'acara_lokasi_3'          => 'nullable|string|max:255',
            'acara_alamat_3'          => 'nullable|string',
            'acara_maps_3'            => 'nullable|string|max:500',
            'love_story_1'            => 'nullable|string',
            'love_story_2'            => 'nullable|string',
            'love_story_3'            => 'nullable|string',
            'love_story_4'            => 'nullable|string',
            'kado_digital_bank_1'     => 'nullable|string|max:255',
            'kado_digital_an_1'       => 'nullable|string|max:255',
            'kado_digital_norek_1'    => 'nullable|string|max:100',
            'kado_digital_bank_2'     => 'nullable|string|max:255',
            'kado_digital_an_2'       => 'nullable|string|max:255',
            'kado_digital_norek_2'    => 'nullable|string|max:100',
            'kado_digital_bank_3'     => 'nullable|string|max:255',
            'kado_digital_an_3'       => 'nullable|string|max:255',
            'kado_digital_norek_3'    => 'nullable|string|max:100',
            'kado_fisik_nama'         => 'nullable|string|max:255',
            'kado_fisik_wa'           => 'nullable|string|min:10|max:15|regex:/^[0-9]+$/',
            'kado_fisik_alamat'       => 'nullable|string',
            'backsound_link'          => 'nullable|string|max:500',
            'backsound_judul'         => 'nullable|string|max:255',
            'backsound_live'          => 'nullable|in:0,1',
            'turut_mengundang'        => 'nullable|string',
            'fotos'                   => 'nullable|array',
            'fotos.*'                 => 'file|image|mimes:jpeg,png,jpg,webp|max:1024',
        ]);

        $hasPhoto = (bool) $request->has_photo;
        $priceName = $hasPhoto ? 'Dengan Foto' : 'Tanpa Foto';
        $priceRecord = \App\Models\Price::where('category', $request->theme_category)
            ->where('name', $priceName)
            ->first();
        $price = $priceRecord ? $priceRecord->price : ($hasPhoto ? 109000 : 79000);
        $priceId = $priceRecord ? $priceRecord->id : null;

        $deadline = $request->acara_tanggal_1 ?? $request->acara_tanggal_2 ?? $request->acara_tanggal_3 ?? null;

        $formData = [
            'mempelai_pria_panggilan'   => $request->data_mempelai_pria_panggilan,
            'mempelai_wanita_panggilan' => $request->data_mempelai_wanita_panggilan,
            'mempelai_pria_lengkap'     => $request->data_mempelai_pria_lengkap,
            'mempelai_wanita_lengkap'   => $request->data_mempelai_wanita_lengkap,
            'ortu_pria'                 => $request->data_mempelai_ortu_pria,
            'ortu_wanita'               => $request->data_mempelai_ortu_wanita,
            'acara'                     => [],
            'love_story'                => [],
            'kado_digital'              => [],
            'kado_fisik_nama'           => $request->kado_fisik_nama,
            'kado_fisik_wa'             => $request->kado_fisik_wa,
            'kado_fisik_alamat'         => $request->kado_fisik_alamat,
            'backsound_link'            => $request->backsound_link,
            'backsound_judul'           => $request->backsound_judul,
            'backsound_live'            => $request->backsound_live,
            'turut_mengundang'          => $request->turut_mengundang,
        ];

        $acaraNama = [
            1 => $request->acara_nama_1,
            2 => $request->acara_nama_2,
            3 => $request->acara_nama_3,
        ];

        foreach ([1, 2, 3] as $i) {
            $nama = $request->{"acara_nama_$i"};
            if (!$nama) continue;
            $formData['acara'][] = [
                'nama'          => $nama,
                'tanggal'       => $request->{"acara_tanggal_$i"},
                'waktu'         => $request->{"acara_waktu_$i"},
                'waktu_selesai' => $request->{"acara_waktu_selesai_$i"},
                'zona_waktu'    => $request->{"acara_zona_$i"},
                'lokasi'        => $request->{"acara_lokasi_$i"},
                'alamat'        => $request->{"acara_alamat_$i"},
                'maps'          => $request->{"acara_maps_$i"},
            ];
        }

        for ($i = 1; $i <= 4; $i++) {
            $story = $request->{"love_story_$i"};
            if ($story) {
                $formData['love_story'][] = $story;
            }
        }

        for ($i = 1; $i <= 3; $i++) {
            $bank = $request->{"kado_digital_bank_$i"};
            $an   = $request->{"kado_digital_an_$i"};
            $rek  = $request->{"kado_digital_norek_$i"};
            if ($bank || $an || $rek) {
                $formData['kado_digital'][] = [
                    'bank'  => $bank,
                    'an'    => $an,
                    'norek' => $rek,
                ];
            }
        }

        $fotoPaths = [];
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                if ($foto && $foto->isValid()) {
                    $fotoPaths[] = $foto->store('uploads/orders', 'public');
                }
            }
        }
        $formData['foto'] = $fotoPaths;

        $customNote = $request->custom_note
            ?? ($request->data_mempelai_pria_panggilan
                ? 'Pemesanan via form website: ' . $request->data_mempelai_pria_panggilan . ' & ' . $request->data_mempelai_wanita_panggilan
                : 'Pemesanan mandiri dari formulir website.');

        $order = Order::create([
            'price_id'       => $priceId,
            'client_name'    => $request->client_name,
            'client_wa'      => $request->client_wa,
            'total_price'    => $price,
            'status'         => 'pending',
            'custom_note'    => $customNote,
            'form_data'      => json_encode($formData),
            'theme_slug'     => $request->theme_slug,
            'theme_name'     => $request->theme_name,
            'theme_category' => $request->theme_category,
            'theme_link'     => $request->theme_link,
            'has_photo'      => $hasPhoto,
            'deadline'       => $deadline,
        ]);

        Log::info('Order baru dibuat', [
            'order_id' => $order->id,
            'client_name' => $request->client_name,
            'client_wa' => $request->client_wa,
            'total_price' => $price,
        ]);

        $admin = User::first();
        $cleanWa = $this->formatWaNumber($admin?->whatsapp_number ?? config('app.whatsapp_fallback'));

        $fotoLabel = $hasPhoto ? 'Dengan Foto' : 'Tanpa Foto';
        $mempelai = '';
        if ($request->data_mempelai_pria_panggilan && $request->data_mempelai_wanita_panggilan) {
            $mempelai = "▪️ *Mempelai:* " . $request->data_mempelai_pria_panggilan . " & " . $request->data_mempelai_wanita_panggilan . "\n";
        }
        $acara = '';
        foreach ([1, 2, 3] as $i) {
            $nama = $request->{"acara_nama_$i"};
            $tgl = $request->{"acara_tanggal_$i"};
            if (!$nama && !$tgl) continue;
            $acara .= "▪️ *{$nama}*";
            if ($tgl) {
                $acara .= ": " . \Carbon\Carbon::parse($tgl)->translatedFormat('d F Y');
            }
            $waktu = $request->{"acara_waktu_$i"};
            if ($waktu) {
                $acara .= " {$waktu}";
                $selesai = $request->{"acara_waktu_selesai_$i"};
                if ($selesai) $acara .= " - {$selesai}";
            }
            $acara .= "\n";
        }

        $messageText = "Halo Admin Va Invite! 👋\n\n"
            . "Ada pesanan baru dari formulir website:\n"
            . "▪️ *Order ID:* #{$order->id}\n"
            . "▪️ *Nama:* " . $request->client_name . "\n"
            . "▪️ *No. WA:* " . $request->client_wa . "\n"
            . $mempelai
            . "▪️ *Tema:* " . $request->theme_name . "\n"
            . "▪️ *Kategori:* " . $request->theme_category . "\n"
            . $acara
            . "▪️ *Opsi:* " . $fotoLabel . "\n"
            . "▪️ *Harga:* Rp " . number_format($price, 0, ',', '.') . "\n"
            . "\nMohon segera diproses ya Admin, terima kasih!";

        $encodedMessage = urlencode($messageText);
        $waUrl = "https://api.whatsapp.com/send?phone={$cleanWa}&text={$encodedMessage}";

        $mempelaiPria = $request->data_mempelai_pria_panggilan;
        $mempelaiWanita = $request->data_mempelai_wanita_panggilan;

        return redirect()->route('public.order.confirmation', [
            'wa_url' => urlencode($waUrl),
            'wa_phone' => $cleanWa,
            'order_id' => $order->id,
            'nama' => $request->client_name,
            'tema' => $request->theme_name,
            'kategori' => $request->theme_category,
            'opsi' => $fotoLabel,
            'harga' => number_format($price, 0, ',', '.'),
            'mempelai' => ($mempelaiPria && $mempelaiWanita) ? "{$mempelaiPria} & {$mempelaiWanita}" : null,
        ]);
    }

    public function confirmation(Request $request)
    {
        return view('order-confirmation', [
            'wa_url'   => urldecode($request->query('wa_url', '')),
            'wa_phone' => strip_tags($request->query('wa_phone', '')),
            'order_id' => strip_tags($request->query('order_id', '')),
            'nama'     => strip_tags($request->query('nama', '')),
            'tema'     => strip_tags($request->query('tema', '')),
            'kategori' => strip_tags($request->query('kategori', '')),
            'opsi'     => strip_tags($request->query('opsi', '')),
            'harga'    => strip_tags($request->query('harga', '')),
            'mempelai' => strip_tags($request->query('mempelai', '')),
        ]);
    }

    public function trackOrder()
    {
        return view('track-order', ['orders' => null]);
    }

    public function trackOrderLookup(Request $request)
    {
        $request->validate(['phone' => 'required|string|max:20|regex:/^[0-9]+$/']);
        $phone = $request->phone;
        $orders = Order::where('client_wa', $phone)
            ->orWhere('client_wa', 'like', $phone . '%')
            ->orWhere('id', $phone)
            ->latest()
            ->get();

        return view('track-order', ['orders' => $orders, 'phone' => $phone]);
    }

    private function formatWaNumber(?string $number): string
    {
        $clean = preg_replace('/[^0-9]/', '', $number ?? '');
        if (str_starts_with($clean, '0')) {
            $clean = '62' . substr($clean, 1);
        } elseif (str_starts_with($clean, '8')) {
            $clean = '62' . $clean;
        }
        return $clean;
    }
}
