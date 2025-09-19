<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentWebhookController;

Route::apiResource('products', ProductController::class)
    ->middleware('web')
    ->except(['index', 'show']);

Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);

Route::get('/', function () {
    return 'API';
});

Route::middleware('web')->group(function () {
    Route::post('/add-account', [AdminController::class, 'addAccount']);
    Route::post('/delete-account', [AdminController::class, 'deleteAccount']);
    Route::post('/login', [AdminController::class, 'login']);
    Route::post('/logout', [AdminController::class, 'logout']);
    Route::get('/is-admin', [AdminController::class, 'isAdmin']);
});
Route::middleware('web')->group(function () {
    Route::apiResource('users', UserController::class)->except('store', 'show');
    Route::post('users/create', [UserController::class, 'store']);
    Route::post('users/login', [UserController::class, 'show']);
    Route::post('/users/logout', [UserController::class, 'logout']);
});


Route::middleware('web')->post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession']);
Route::post('/webhook', [PaymentWebhookController::class, 'handleWebhook']);
