<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;

class ProfileForm extends Form
{
    // Properti Informasi Akun & Integrasi
    #[Validate('required|string|max:255', as: 'Nama Admin')]
    public $name = '';

    #[Validate('required|email|max:255', as: 'Email Admin')]
    public $email = '';

    #[Validate('required|numeric|digits_between:10,15', as: 'Nomor WhatsApp')]
    public $whatsappNumber = '';

    #[Validate('nullable|url', as: 'Link Linktree')]
    public $linktreeUrl = '';

    // Properti Ganti Password (Nullable, diisi hanya jika ingin ganti sandi)
    public $currentPassword = '';
    public $password = '';
    public $password_confirmation = '';

    public function setForm($user)
    {
        $this->name           = $user->name;
        $this->email          = $user->email;
        $this->whatsappNumber = $user->whatsapp_number;
        $this->linktreeUrl    = $user->linktree_url;
    }

    /**
     * Jalankan validasi khusus untuk penggantian password jika kolom diisi
     */
    public function validatePasswordUpdate()
    {
        if (!empty($this->currentPassword) || !empty($this->password) || !empty($this->password_confirmation)) {

            $this->validate([
                'currentPassword'       => ['required', 'string'],
                'password'              => ['required', 'string', 'min:8', 'confirmed'],
                'password_confirmation' => ['required', 'string'],
            ], [
                'password.confirmed' => 'Konfirmasi password baru tidak cocok.',
                'password.min'       => 'Password baru minimal harus 8 karakter.',
            ]);

            // Cek apakah password lama sesuai dengan yang ada di database
            if (!Hash::check($this->currentPassword, Auth::user()->password)) {
                throw ValidationException::withMessages([
                    'form.currentPassword' => 'Password lama yang Anda masukkan salah!',
                ]);
            }
        }
    }

    public function resetPasswordFields()
    {
        $this->reset(['currentPassword', 'password', 'password_confirmation']);
    }
}
