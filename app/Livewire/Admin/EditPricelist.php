<?php

namespace App\Livewire\Admin;

use App\Models\Price;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditPricelist extends Component
{
    #[Title('Edit Pricelist')]

    public $editingId = null;
    public $editPrice = '';

    public $categoryList = [
        'Wedding', 'Birthday', 'Umum / Seminar', 'Christmas & NY',
        'Aqiqah & Tasmiyah', 'Syukuran & Islami', 'Tasyakuran Khitan',
        'Party & Dinner', 'School & Graduation'
    ];

    public function getIconByCategory($categoryName)
    {
        return match ($categoryName) {
            'Wedding'              => 'fa-heart',
            'Birthday'             => 'fa-birthday-cake',
            'Umum / Seminar'       => 'fa-calendar-days',
            'Christmas & NY'       => 'fa-snowflake',
            'Aqiqah & Tasmiyah'    => 'fa-child',
            'Syukuran & Islami'    => 'fa-moon',
            'Tasyakuran Khitan'    => 'fa-scissors',
            'Party & Dinner'       => 'fa-utensils',
            'School & Graduation'  => 'fa-graduation-cap',
            default                => 'fa-tags',
        };
    }

    public function startEdit($id)
    {
        $item = Price::findOrFail($id);
        $this->editingId = $id;
        $this->editPrice = $item->price;
    }

    public function cancelEdit()
    {
        $this->editingId = null;
        $this->editPrice = '';
    }

    public function savePrice($id)
    {
        $this->validate(['editPrice' => 'required|numeric|min:0']);

        $item = Price::findOrFail($id);
        $item->update(['price' => $this->editPrice]);

        $this->editingId = null;
        $this->editPrice = '';

        $this->dispatch('toast', message: '✅ Harga berhasil diperbarui!');
    }

    public function render()
    {
        $pricelist = Price::orderBy('category')->orderBy('name')->get()->groupBy('category');

        return view('livewire.admin.edit-pricelist', [
            'pricelist' => $pricelist,
            'categories' => $this->categoryList,
        ])->layout('components.layouts.admin');
    }
}
