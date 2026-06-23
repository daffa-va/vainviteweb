<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('auth.login');
    }

    public function progressLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required'    => 'Kolom email wajib diisi.',
            'email.email'       => 'Format alamat email tidak valid.',
            'password.required' => 'Kolom password wajib diisi.',
        ]);

        // Remember me
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if ($remember) {
                // Ambil semua cookie yang ada pada request saat ini
                foreach (headers_list() as $header) {
                    if (Str::startsWith($header, 'Set-Cookie: remember_web_')) {
                        // Cari nama cookie remember bawaan guard auth web Laravel
                        $cookieName = Auth::getRecallerName();
                        $cookieValue = $request->cookies->get($cookieName) ?? Auth::user()->getRememberToken();

                        if ($cookieValue) {
                            // Set ulang cookie tersebut dengan durasi 30 hari (43200 menit)
                            Cookie::queue($cookieName, $cookieValue, 43200);
                        }
                        break;
                    }
                }

                // Pengaman alternatif: Antrekan langsung cookie jika Laravel belum sempat menulisnya ke header
                Cookie::queue(Auth::getRecallerName(), Auth::user()->getRememberToken(), 43200);
            }

            // Alihkan masuk ke halaman utama admin dashboard
            return redirect()->intended(route('admin.dashboard'));
        }

        // 4. Jika gagal, lemparkan error kembali ke halaman login dengan input email lama
        throw ValidationException::withMessages([
            'email' => 'Email atau password yang Anda masukkan salah!',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    public function buatUser()
    {
        $adminEmail = 'admin@vadesign.com';

        // 2. Cek apakah user dengan email tersebut sudah terdaftar di database
        $userExists = User::where('email', $adminEmail)->exists();

        if ($userExists) {
            return response('<div style="font-family: sans-serif; text-align: center; margin-top: 100px;">
            <h1 style="color: #eab308;">⚠️ Akses Ditolak</h1>
            <p style="color: #64748b;">Akun utama admin dengan email <strong>' . $adminEmail . '</strong> sudah dibuat sebelumnya!</p>
            <a href="' . route('login') . '" style="color: #3b82f6; text-decoration: none; font-weight: 600;">Ke Halaman Login &rarr;</a>
        </div>', 200)->header('Content-Type', 'text/html');
        }

        // 3. Jika belum ada, buat user admin baru (Sesuai struktur tabel kamu yang sudah dirampingkan)
        User::create([
            'name'             => 'Admin Va Invite',
            'email'            => $adminEmail,
            'password'         => Hash::make('passwordadmin123'),
            'whatsapp_number'  => '087760058673',
            'linktree_url'     => 'https://linktr.ee/VaDesignn',
            'role'             => 'admin',
        ]);

        return response('<div style="font-family: sans-serif; text-align: center; margin-top: 100px;">
        <h1 style="color: #22c55e;">🎉 Sukses Besar!</h1>
        <p style="color: #64748b;">Akun master admin berhasil disuntikkan ke database SQLite.</p>
        <div style="background: #1e293b; color: #f8fafc; display: inline-block; padding: 15px 25px; border-radius: 8px; text-align: left; margin: 15px 0;">
            <strong>Email:</strong> ' . $adminEmail . '<br>
            <strong>Password:</strong> passwordadmin123
        </div>
        <br><br>
        <a href="' . route('login') . '" style="color: #3b82f6; text-decoration: none; font-weight: 600;">Lanjut ke Halaman Login &rarr;</a>
    </div>', 200)->header('Content-Type', 'text/html');
    }
}
