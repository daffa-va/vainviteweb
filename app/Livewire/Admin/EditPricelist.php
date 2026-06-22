<?php

namespace App\Livewire\Admin;

use App\Livewire\Forms\PriceForm;
use App\Models\Price;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class EditPricelist extends Component
{
    #[Title('Edit Pricelist')]

    public PriceForm $form;

    public $isOpen = false;
    public $isEdit = false;

    #[Url(history: true)]
    public $filterCategory = 'all';

    public function getIconByCategory($categoryName)
    {
        return match ($categoryName) {
            'Tugas Sekolah / Kuliah' => 'fa-book',
            'Spanduk & Banner'        => 'fa-image',
            'Desain Media Sosial'     => 'fa-hashtag',
            default                   => 'fa-tags',
        };
    }

    public function openAddModal()
    {
        $this->form->resetAll();
        $this->isEdit = false; // Set judul modal ke "Tambah Layanan Baru"
        $this->isOpen = true;  // Memicu class .show pada overlay modal
    }

    public function openEditModal($id)
    {
        $item = Price::findOrFail($id);
        $this->form->setForm($item);

        $this->isEdit = true;  // Set judul modal ke "Edit Detail Layanan"
        $this->isOpen = true;  // Munculkan jendela modal
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    public function save()
    {
        // Jalankan validasi yang ada di dalam Form Object (PriceForm)
        $this->form->validate();

        // Cari tahu ikon otomatisnya berdasarkan pilihan kategori di form
        $iconClass = $this->getIconByCategory($this->form->category);

        if ($this->isEdit) {
            // Update Data
            $record = Price::findOrFail($this->form->priceId);
            $record->update([
                'category' => $this->form->category,
                'name'     => $this->form->name,
                'price'    => $this->form->price,
                'icon'     => $iconClass,
            ]);
            $this->dispatch('toast', message: '✅ Detail paket berhasil diperbarui!');
        } else {
            // Create Data Baru
            Price::create([
                'category' => $this->form->category,
                'name'     => $this->form->name,
                'price'    => $this->form->price,
                'icon'     => $iconClass,
            ]);
            $this->dispatch('toast', message: '🎉 Paket layanan baru berhasil ditambahkan!');
        }

        $this->closeModal();
    }

    public function delete($id)
    {
        Price::findOrFail($id)->delete();
        $this->dispatch('toast', message: '🗑️ Paket layanan berhasil dihapus!');
    }

    public function render()
    {
        return view('livewire.admin.edit-pricelist', [
            'pricelist' => Price::filterByCategory($this->filterCategory)
                ->latest()
                ->get()
        ])->layout('components.layouts.admin');
    }
}
