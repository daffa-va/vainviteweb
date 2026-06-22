<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PriceForm extends Form
{
    #[Validate('required|min:3')]
    public $name = '';

    #[Validate('required|numeric|min:0')]
    public $price = '';

    #[Validate('required|in:Tugas Sekolah / Kuliah,Spanduk & Banner,Desain Media Sosial')]
    public $category = 'Tugas Sekolah / Kuliah';
    public $icon_class = '';
    public $priceId = null;

    public function setForm($item)
    {
        $this->priceId = $item->id;
        $this->name = $item->name;
        $this->price = $item->price;
        $this->category = $item->category;
        $this->icon_class = $item->icon_class;
    }

    public function resetAll()
    {
        $this->reset(['name', 'price', 'category', 'icon_class', 'priceId']);
    }
}
