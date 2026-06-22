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

    #[Validate('required|exists:prices,id', as: 'Jenis Layanan')]
    public $priceId = '';

    #[Validate('required|numeric|min:0', as: 'Harga Deal')]
    public $totalPrice = '';

    public $customNote = '';

    #[Validate('required|in:pending,progress,done', as: 'Status')]
    public $status = 'progress'; // Default ditambahkan admin langsung masuk progress

    public function setForm($order)
    {
        $this->orderId    = $order->id;
        $this->clientName = $order->client_name;
        $this->clientWa   = $order->client_wa;
        $this->priceId    = $order->price_id;
        $this->totalPrice = $order->total_price;
        $this->customNote = $order->custom_note;
        $this->status     = $order->status;
    }

    public function resetAll()
    {
        $this->reset(['orderId', 'clientName', 'clientWa', 'priceId', 'totalPrice', 'customNote']);
        $this->status = 'progress';
    }
}
