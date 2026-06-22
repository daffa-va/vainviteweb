<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Livewire\Forms\ProfileForm;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;

class Setting extends Component
{
    #[Title('Pengaturan')]
    public ProfileForm $form;

    public function mount()
    {
        // Ambil data admin yang sedang login saat ini
        $user = Auth::user();
        $this->form->setForm($user);
    }

    public function updateProfile()
    {
        // 1. Validasi data informasi akun umum
        $this->form->validate();

        $user = Auth::user();

        // 2. Perbarui data utama ke dalam tabel users
        $user->update([
            'name'            => $this->form->name,
            'email'           => $this->form->email,
            'whatsapp_number' => $this->form->whatsappNumber,
            'linktree_url'    => $this->form->linktreeUrl,
        ]);

        $this->dispatch('toast', message: '✅ Informasi profil & gateway berhasil diperbarui!');
    }

    public function updatePassword()
    {
        // 1. Validasi password lama dan konfirmasi sandi baru
        $this->form->validatePasswordUpdate();

        $user = Auth::user();

        // 2. Enkripsi sandi baru dan simpan ke database
        $user->update([
            'password' => Hash::make($this->form->password)
        ]);

        // 3. Bersihkan kembali field input password pada form modal/page
        $this->form->resetPasswordFields();

        $this->dispatch('toast', message: '🔒 Kunci keamanan password berhasil diubah!');
    }


    public function render()
    {
        return view('livewire.admin.setting')->layout('components.layouts.admin');
    }
}
