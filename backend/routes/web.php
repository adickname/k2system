<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SSEController;


Route::get('/payment/success', function () {
    return "payment successed";
})->name('payment.success');

Route::get('/payment/cancel', function () {
    return "payment canceled";
})->name('payment.cancel');
