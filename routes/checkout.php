<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

Route::middleware('auth')->group(function () {
    Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
});
