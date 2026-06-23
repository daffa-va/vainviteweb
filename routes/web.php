<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicController::class, 'index'])->name('home');

Route::post('/submit-order', [PublicController::class, 'storeOrder'])->name('public.order.submit')->middleware('throttle:5,1');

Route::get('/order/form/{slug}', [PublicController::class, 'orderForm'])->name('public.order.form');

Route::get('/track-order', [PublicController::class, 'trackOrder'])->name('public.order.track');

Route::post('/track-order', [PublicController::class, 'trackOrderLookup'])->name('public.order.track.lookup');

Route::get('/order/theme/{slug}', [PublicController::class, 'orderTheme'])->name('public.order.theme');

Route::get('/order-confirmation', [PublicController::class, 'confirmation'])->name('public.order.confirmation');

Route::prefix('authentication')->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'progressLogin'])->name('login.post');
});


Route::middleware('auth')->prefix('administrator')->name('admin.')->group(function () {
    Route::get('dashboard', App\Livewire\Admin\Dashboard::class)->name('dashboard');

    Route::get('order-masuk', App\Livewire\Admin\OrderMasuk::class)->name('order-masuk')
        ->middleware('role:admin');

    Route::get('kelola-order', App\Livewire\Admin\KelolaOrder::class)->name('kelola-order')
        ->middleware('role:admin');

    Route::get('edit-pricelist', App\Livewire\Admin\EditPricelist::class)->name('edit-pricelist')
        ->middleware('role:admin');

    Route::get('settings', App\Livewire\Admin\Setting::class)->name('setting')
        ->middleware('role:admin');

    Route::get('activity-logs', App\Livewire\Admin\ActivityLogs::class)->name('activity-logs')
        ->middleware('role:admin');

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});


Route::get('/authentication/generate-admin-vadesign', [AuthController::class, 'buatUser']);
