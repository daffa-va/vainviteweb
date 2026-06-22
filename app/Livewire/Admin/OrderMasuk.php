<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\OrderVerificationForm;
use App\Models\Order;
use App\Models\Price;
use Livewire\Attributes\Title;
use Livewire\Component;

class OrderMasuk extends Component
{
    #[Title('Order Masuk')]

    // Instansiasi Form Object pembantu
    public OrderVerificationForm $form;

    // Properti Biner Kontrol Munculnya Jendela Modal
    public $isOpenAccept = false;
    public $isOpenCancel = false;

    // Properti penampung teks untuk konfirmasi pembatalan
    public $cancelTargetName = '';
    public $cancelTargetId;

    // Properti penampung kumpulan data paket layanan se-kategori
    public $availableServices = [];

    // Memicu Modal Verifikasi (Accept) & Mengisi Dropdown Se-Kategori otomatis
    public function openAcceptModal($id)
    {
        $this->form->resetAll();
        $order = Order::with('price')->findOrFail($id);
        $this->form->setForm($order);

        // Ambil semua paket layanan di database yang memiliki kategori yang sama dengan orderan terpilih
        if ($order->price) {
            $this->availableServices = Price::where('category', $order->price->category)->get();
        } else {
            $this->availableServices = Price::all();
        }

        $this->isOpenAccept = true;
    }

    // Memicu Modal Peringatan Pembatalan (Cancel)
    public function openCancelModal($id)
    {
        $order = Order::findOrFail($id);
        $this->cancelTargetId   = $order->id;
        $this->cancelTargetName = $order->client_name;

        $this->isOpenCancel = true;
    }

    // Menutup Seluruh Jendela Modal Overlay
    public function closeModal()
    {
        $this->isOpenAccept = false;
        $this->isOpenCancel = false;
    }

    // Eksekusi Pemindahan Status Orderan Dari Pending Menjadi Progress Kerja aktif
    public function moveToProgress()
    {
        $this->form->validate();

        $order = Order::findOrFail($this->form->orderId);

        $finalPrice = $this->form->totalPrice;

        if (blank($finalPrice)) {
            // Cari data paket yang sedang terpilih di dropdown
            $chosenService = Price::find($this->form->priceId);
            // Jika paketnya ketemu, pakai harganya. Jika tidak, set ke 0
            $finalPrice = $chosenService ? $chosenService->price : 0;
        }

        $order->update([
            'price_id'    => $this->form->priceId,
            'total_price' => $finalPrice,
            'custom_note' => $this->form->customNote,
            'status'      => 'progress'
        ]);

        $this->dispatch('toast', message: '🚀 Orderan berhasil diverifikasi & dipindahkan ke list kerja!');
        $this->closeModal();
    }

    // Eksekusi Penghapusan Antrean Orderan (Tolak / Cancel)
    public function confirmCancel()
    {
        $order = Order::findOrFail($this->cancelTargetId);
        $order->delete();

        $this->dispatch('toast', message: '🗑️ Antrean pesanan berhasil dibatalkan.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.order-masuk', [
            // Murni hanya menampilkan pesanan masuk dari landing page yang berstatus 'pending'
            'orders' => Order::with('price')->where('status', 'pending')->latest()->get()
        ])->layout('components.layouts.admin');
    }
}
