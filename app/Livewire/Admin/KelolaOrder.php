<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\Price;
use App\Livewire\Forms\OrderManagementForm;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;

class KelolaOrder extends Component
{
    #[Title('Manajemen Order')]

    public OrderManagementForm $form;

    // Properti filter pencarian multi-layer (tersimpan di URL agar user-friendly)
    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $status = 'all';

    // Kontrol Modal UI
    public $isOpen = false;
    public $isEdit = false;

    // Sinkronisasi reset page jika admin mengetik keyword pencarian baru
    public function updatedSearch()
    {
        // Jika memakai pagination bawaan livewire, bisa panggil $this->resetPage();
    }

    public function openAddModal()
    {
        $this->form->resetAll();
        // Set otomatis opsi pertama dari master price jika data tersedia
        $firstPrice = Price::first();
        if ($firstPrice) {
            $this->form->priceId = $firstPrice->id;
            $this->form->totalPrice = $firstPrice->price;
        }

        $this->isEdit = false;
        $this->isOpen = true;
    }

    public function openEditModal($id)
    {
        $order = Order::findOrFail($id);
        $this->form->setForm($order);

        $this->isEdit = true;
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    // Otomatisasi pengisian harga default saat admin mengganti jenis layanan di dalam modal
    public function updatedFormPriceId($value)
    {
        $price = Price::find($value);
        if ($price) {
            $this->form->totalPrice = $price->price;
        }
    }

    public function save()
    {
        $this->form->validate();

        $dataArray = $this->form->only([
            'clientName',
            'clientWa',
            'priceId',
            'totalPrice',
            'customNote',
            'status'
        ]);

        $dbData = [
            'client_name' => $dataArray['clientName'],
            'client_wa'   => $dataArray['clientWa'],
            'price_id'    => $dataArray['priceId'],
            'total_price' => $dataArray['totalPrice'],
            'custom_note' => $dataArray['customNote'],
            'status'      => $dataArray['status'],
        ];

        if ($this->isEdit) {
            $order = Order::findOrFail($this->form->orderId);
            $order->update($dbData);
            $this->dispatch('toast', message: '✅ Data order berhasil diperbarui!');
        } else {
            Order::create($dbData);
            $this->dispatch('toast', message: '🎉 Data order baru berhasil ditambahkan manual!');
        }

        $this->closeModal();
    }

    public function delete($id)
    {
        Order::findOrFail($id)->delete();
        $this->dispatch('toast', message: '🗑️ Data order berhasil dihapus!');
    }

    public function render()
    {
        return view('livewire.admin.kelola-order', [
            // Memanggil query scope gabungan dari model Order
            'orders' => Order::with('price')
                ->searchFilter($this->search, $this->status)
                ->latest()
                ->get(),
            // Memuat list untuk opsi dropdown pilihan paket layanan di form modal
            'services' => Price::orderBy('category')->get()
        ])->layout('components.layouts.admin');
    }
}
