<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class OrderVerificationForm extends Form
{
    public $orderId;
    public $clientName;
    public $clientWa;

    // Menampung ID layanan akhir yang dipilih dari dropdown admin
    #[Validate('required|exists:prices,id', as: 'Paket Layanan')]
    public $priceId;

    // Menampung nilai kesepakatan harga final dari negosiasi WA
    #[Validate('nullable|numeric|min:0', as: 'Harga Deal Akhir')]
    public $totalPrice = '';

    // Menampung catatan teknis kustom pengerjaan
    public $customNote = '';

    public function setForm($order)
    {
        $this->orderId    = $order->id;
        $this->clientName = $order->client_name;
        $this->clientWa   = $order->client_wa;
        $this->priceId    = $order->price_id;
    }

    public function resetAll()
    {
        $this->reset(['orderId', 'clientName', 'clientWa', 'priceId', 'totalPrice', 'customNote']);
    }
}
