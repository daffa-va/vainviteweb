<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;

class OrderManagementForm extends Form
{
    public $orderId;

    #[Validate('required|string|max:255', as: 'Nama Client')]
    public $clientName = '';

    #[Validate('required|string|max:20', as: 'Nomor WhatsApp')]
    public $clientWa = '';

    #[Validate('required', as: 'Kategori Tema')]
    public $themeCategory = '';

    public $themeName = '';

    public $priceId = '';

    #[Validate('required|numeric|min:0', as: 'Harga Deal')]
    public $totalPrice = '';

    public $customNote = '';

    public $resultLink = '';

    public $hasPhoto = null;

    public $deadline = '';

    #[Validate('required|in:pending,progress,done', as: 'Status')]
    public $status = 'progress';

    public function setForm($order)
    {
        $this->orderId       = $order->id;
        $this->clientName    = $order->client_name;
        $this->clientWa      = $order->client_wa;
        $this->themeCategory = $order->theme_category ?? '';
        $this->themeName     = $order->theme_name ?? '';
        $this->priceId       = $order->price_id;
        $this->totalPrice    = $order->total_price;
        $this->customNote    = $order->custom_note;
        $this->resultLink    = $order->result_link;
        $this->hasPhoto      = $order->has_photo;
        $this->deadline      = $order->deadline ?? '';
        $this->status        = $order->status;
    }

    public function resetAll()
    {
        $this->reset(['orderId', 'clientName', 'clientWa', 'themeCategory', 'themeName', 'priceId', 'totalPrice', 'customNote', 'resultLink', 'hasPhoto', 'deadline']);
        $this->status = 'progress';
    }
}
