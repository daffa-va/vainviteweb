<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::post('/submit-order', [PublicController::class, 'storeOrder'])->name('public.order.submit');

Route::prefix('authentication')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'progressLogin'])->name('login.post');
});


Route::middleware('auth')->prefix('administrator')->name('admin.')->group(function () {
    Route::get('dashboard', App\Livewire\Admin\Dashboard::class)->name('dashboard');

    Route::get('order-masuk', App\Livewire\Admin\OrderMasuk::class)->name('order-masuk');

    Route::get('kelola-order', App\Livewire\Admin\KelolaOrder::class)->name('kelola-order');

    Route::get('edit-pricelist', App\Livewire\Admin\EditPricelist::class)->name('edit-pricelist');

    Route::get('settings', App\Livewire\Admin\Setting::class)->name('setting');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/authentication/generate-admin-vadesign', [AuthController::class, 'buatUser']);
