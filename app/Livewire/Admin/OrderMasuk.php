<?php

namespace App\Livewire\Admin;

use App\Models\Order;
use App\Helpers\LogHelper;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class OrderMasuk extends Component
{
    use WithPagination;

    #[Title('Order Masuk')]

    public $isOpenCancel = false;
    public $isOpenDetail = false;

    public $detailOrder = null;

    public $cancelTargetName = '';
    public $cancelTargetId;

    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function openAcceptModal($id)
    {
        $order = Order::findOrFail($id);
        $oldData = $order->toArray();
        $order->update(['status' => 'progress']);
        $logName = $order->client_name ?? $order->theme_name ?? 'Pengunjung';
        LogHelper::log('accept_order', "Menerima order {$logName} ke progress", 'Order', $order->id, $oldData, $order->toArray());
        $this->dispatch('toast', message: '🚀 Orderan berhasil diverifikasi & dipindahkan ke list kerja!');
    }

    public function openCancelModal($id)
    {
        $order = Order::findOrFail($id);
        $this->cancelTargetId   = $order->id;
        $this->cancelTargetName = $order->client_name ?? $order->theme_name ?? 'Pengunjung';

        $this->isOpenCancel = true;
    }

    public function closeModal()
    {
        $this->isOpenCancel = false;
        $this->isOpenDetail = false;
        $this->detailOrder = null;
    }

    public function openDetail($id)
    {
        $this->detailOrder = Order::with('price')->findOrFail($id);
        $this->isOpenDetail = true;
    }

    public function confirmCancel()
    {
        $order = Order::findOrFail($this->cancelTargetId);
        $oldData = $order->toArray();
        $logName = $order->client_name ?? $order->theme_name ?? 'Pengunjung';
        LogHelper::log('cancel_order', "Membatalkan order {$logName}", 'Order', $order->id, $oldData);
        $order->delete();

        $this->dispatch('toast', message: '🗑️ Antrean pesanan berhasil dibatalkan.');
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.admin.order-masuk', [
            'orders' => Order::with('price')
                ->where('status', 'pending')
                ->when($this->search, function ($q) {
                    $q->where(function ($sub) {
                        $sub->where('client_name', 'like', '%' . $this->search . '%')
                            ->orWhere('client_wa', 'like', '%' . $this->search . '%')
                            ->orWhere('theme_name', 'like', '%' . $this->search . '%')
                            ->orWhere('theme_category', 'like', '%' . $this->search . '%');
                    });
                })
                ->latest()
                ->paginate(20)
        ])->layout('components.layouts.admin');
    }
}
