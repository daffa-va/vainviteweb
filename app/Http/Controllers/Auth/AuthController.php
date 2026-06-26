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
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login()
    {
        try {
            if (Auth::check()) {
                return redirect()->route('admin.dashboard');
            }
            return view('auth.login');
        } catch (\Exception $e) {
            Log::error('Login page error: ' . $e->getMessage());
            return view('auth.login');
        }
    }

    public function progressLogin(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email'    => ['required', 'email'],
                'password' => ['required', 'string'],
            ], [
                'email.required'    => 'Kolom email wajib diisi.',
                'email.email'       => 'Format alamat email tidak valid.',
                'password.required' => 'Kolom password wajib diisi.',
            ]);

            $remember = $request->has('remember');

            if (Auth::attempt($credentials, $remember)) {
                $request->session()->regenerate();

                Cache::flush();

                if ($remember) {
                    Cookie::queue(Auth::getRecallerName(), Auth::user()->getRememberToken(), 43200);
                }

                return redirect()->intended(route('admin.dashboard'));
            }

            throw ValidationException::withMessages([
                'email' => 'Email atau password yang Anda masukkan salah!',
            ]);
        } catch (ValidationException $e) {
            throw $e;
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi.');
        }
    }

    public function logout(Request $request)
    {
        try {
            Cache::flush();
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
        } catch (\Exception $e) {
            Log::error('Logout error: ' . $e->getMessage());
        }
        return redirect()->route('login');
    }

    public function buatUser()
    {
        try {
            $adminEmail = 'admin@vadesign.com';

            $userExists = User::where('email', $adminEmail)->exists();

            if ($userExists) {
                return response('<div style="font-family: sans-serif; text-align: center; margin-top: 100px;">
                <h1 style="color: #eab308;">⚠️ Akses Ditolak</h1>
                <p style="color: #64748b;">Akun utama admin dengan email <strong>' . $adminEmail . '</strong> sudah dibuat sebelumnya!</p>
                <a href="' . route('login') . '" style="color: #3b82f6; text-decoration: none; font-weight: 600;">Ke Halaman Login &rarr;</a>
            </div>', 200)->header('Content-Type', 'text/html');
            }

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
        } catch (\Exception $e) {
            Log::error('Create admin user error: ' . $e->getMessage());
            return response('<div style="font-family: sans-serif; text-align: center; margin-top: 100px;">
            <h1 style="color: #ef4444;">❌ Error</h1>
            <p style="color: #64748b;">Gagal membuat akun admin: ' . $e->getMessage() . '</p>
            <a href="' . route('login') . '" style="color: #3b82f6; text-decoration: none; font-weight: 600;">Ke Halaman Login &rarr;</a>
        </div>', 500)->header('Content-Type', 'text/html');
        }
    }
}
