<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SSEController;


Route::get('/payment/success', function () {
    return redirect(env("FRONTEND_URL") . "/status-platnosci?correct=true");
})->name('payment.success');

Route::get('/payment/cancel', function () {
    return redirect(env("FRONTEND_URL") . "/status-platnosci?correct=false");
})->name('payment.cancel');
