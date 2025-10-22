<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');
});

Route::get('/about', function () {
    return view('about');
})->name('about');

// Trang liên hệ
Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// 🏠 Trang chủ → chuyển hướng đến danh sách sản phẩm
Route::get('/', function () {
    return redirect()->route('about');
})->name('home');

require __DIR__ . '/auth.php';
require __DIR__ . '/product.php';
require __DIR__ . '/cart.php';
require __DIR__ . '/order.php';
require __DIR__ . '/checkout.php';

use App\Http\Controllers\Admin\OrderAdminController;

Route::middleware(['auth', 'checkadmin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/orders', [OrderAdminController::class, 'index'])->name('orders.index');
        Route::get('/orders/{id}', [OrderAdminController::class, 'show'])->name('orders.show');
        Route::post('/orders/{id}/status', [OrderAdminController::class, 'updateStatus'])->name('orders.updateStatus');
    });
