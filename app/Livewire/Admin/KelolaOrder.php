<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\Price;
use App\Livewire\Forms\OrderManagementForm;
use App\Models\User;
use App\Helpers\LogHelper;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithPagination;

class KelolaOrder extends Component
{
    use WithPagination;

    #[Title('Manajemen Order')]

    public OrderManagementForm $form;

    #[Url(history: true)]
    public $search = '';

    #[Url(history: true)]
    public $status = 'all';

    public $isOpen = false;
    public $isEdit = false;
    public $isOpenDetail = false;
    public $detailOrder = null;

    public $categoryList = [
        'Wedding', 'Birthday', 'Umum / Seminar', 'Christmas & NY',
        'Aqiqah & Tasmiyah', 'Syukuran & Islami', 'Tasyakuran Khitan',
        'Party & Dinner', 'School & Graduation'
    ];

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function openAddModal()
    {
        $this->form->resetAll();
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
        $this->isOpenDetail = false;
        $this->detailOrder = null;
    }

    public function openDetail($id)
    {
        $this->detailOrder = Order::with('price')->findOrFail($id);
        $this->isOpenDetail = true;
    }

    public function updatedFormHasPhoto($value)
    {
        if ($value === '1') {
            $this->form->totalPrice = 109000;
        } elseif ($value === '0') {
            $this->form->totalPrice = 79000;
        }
    }

    public function save()
    {
        $this->form->validate();

        $dataArray = $this->form->only([
            'clientName',
            'clientWa',
            'totalPrice',
            'customNote',
            'status'
        ]);

        $dbData = [
            'client_name'   => $dataArray['clientName'],
            'client_wa'     => $dataArray['clientWa'],
            'total_price'   => $dataArray['totalPrice'],
            'custom_note'   => $dataArray['customNote'],
            'status'        => $dataArray['status'],
            'theme_category'=> $this->form->themeCategory,
            'theme_name'    => $this->form->themeName,
            'price_id'      => null,
            'result_link'   => $this->form->resultLink,
            'has_photo'     => $this->form->hasPhoto,
            'deadline'      => $this->form->deadline,
        ];

        if ($this->isEdit) {
            $order = Order::findOrFail($this->form->orderId);
            $oldData = $order->toArray();
            $oldStatus = $order->status;
            $order->update($dbData);

            LogHelper::log('update', "Mengupdate order {$order->client_name}", 'Order', $order->id, $oldData, $order->toArray());

            if ($order->status === 'done' && $oldStatus !== 'done' && $order->result_link && $order->client_wa) {
                $this->sendDoneWa($order);
            }

            $this->dispatch('toast', message: '✅ Data order berhasil diperbarui!');
        } else {
            $order = Order::create($dbData);
            LogHelper::log('create', "Membuat order baru untuk {$order->client_name}", 'Order', $order->id);
            $this->dispatch('toast', message: '🎉 Data order baru berhasil ditambahkan manual!');
        }

        $this->closeModal();
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        $clientName = $order->client_name;
        LogHelper::log('delete', "Menghapus order {$clientName}", 'Order', $id, $order->toArray());
        $order->delete();
        $this->dispatch('toast', message: '🗑️ Data order berhasil dihapus!');
    }

    public function markDone($id)
    {
        $order = Order::findOrFail($id);
        if ($order->status === 'done') return;

        if (!$order->result_link) {
            $this->dispatch('toast', message: '⚠️ Isi Link Undangan Jadi terlebih dahulu sebelum menandai selesai!');
            return;
        }

        $oldData = $order->toArray();
        $order->update(['status' => 'done']);
        LogHelper::log('mark_done', "Menandai order {$order->client_name} selesai", 'Order', $id, $oldData, $order->toArray());

        if ($order->client_wa) {
            $this->sendDoneWa($order);
        }

        $this->dispatch('toast', message: '✅ Order selesai & link undangan sudah dikirim ke client via WA!');
    }

    public function exportCsv()
    {
        $orders = Order::searchFilter($this->search, $this->status)->latest()->get();

        $csv = "Tgl,Client,WA,Kategori,Tema,Foto,Status,Total,Deadline,Link\n";
        foreach ($orders as $o) {
            $foto = $o->has_photo === null ? '-' : ($o->has_photo ? 'Dengan Foto' : 'Tanpa Foto');
            $csv .= implode(',', [
                $o->created_at->format('d/m/Y'),
                '"' . str_replace('"', '""', $o->client_name ?? '') . '"',
                $o->client_wa ?? '-',
                $o->theme_category ?? '',
                '"' . str_replace('"', '""', $o->theme_name ?? '') . '"',
                $foto,
                $o->status,
                $o->total_price ?? 0,
                $o->deadline ?? '',
                '"' . str_replace('"', '""', $o->result_link ?? '') . '"',
            ]) . "\n";
        }

        return response()->streamDownload(function () use ($csv) {
            echo $csv;
        }, 'orders-export-' . now()->format('Y-m-d') . '.csv', ['Content-Type' => 'text/csv']);
    }

    private function sendDoneWa($order)
    {
        $admin = User::first();
        $rawWa = $admin ? $admin->whatsapp_number : config('app.whatsapp_fallback');

        $messageText = "Halo {$order->client_name}! 🎉\n\n"
            . "Undangan digital Anda sudah selesai dikerjakan!\n\n"
            . "🔗 *Link Undangan:* {$order->result_link}\n\n"
            . "Silakan cek dan bagikan ke tamu undangan. Terima kasih telah mempercayakan undangan Anda kepada Va Invite! 🙏";

        $encoded = urlencode($messageText);
        $cleanWa = preg_replace('/[^0-9]/', '', $order->client_wa);
        if (str_starts_with($cleanWa, '0')) $cleanWa = '62' . substr($cleanWa, 1);
        if (str_starts_with($cleanWa, '8')) $cleanWa = '62' . $cleanWa;

        $waUrl = "https://api.whatsapp.com/send?phone={$cleanWa}&text={$encoded}";
        $this->dispatch('openWa', url: $waUrl);
    }

    public function render()
    {
        return view('livewire.admin.kelola-order', [
            'orders' => Order::with('price')
                ->searchFilter($this->search, $this->status)
                ->latest()
                ->paginate(20),
            'categories' => $this->categoryList,
        ])->layout('components.layouts.admin');
    }
}
