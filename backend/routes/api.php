<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentWebhookController;

Route::apiResource('products', ProductController::class)
    ->middleware('auth:sanctum-admin')
    ->except(['index', 'show']);

Route::get('products', [ProductController::class, 'index']);
Route::get('products/{product}', [ProductController::class, 'show']);

Route::get('/', function () {
    return 'API';
});

Route::post('/add-account', [AuthController::class, 'addAccount']);
Route::post('/delete-account', [AuthController::class, 'deleteAccount'])->middleware('auth:sanctum-admin');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum-admin');

Route::apiResource('users', UserController::class)->middleware('auth:sanctum-user')->except('store', 'show');
Route::post('users/create', [UserController::class, 'store']);
Route::post('users/login', [UserController::class, 'show']);


Route::middleware('auth:sanctum-user')->post('/create-checkout-session', [PaymentController::class, 'createCheckoutSession']);

Route::post('/stripe/webhook', [PaymentWebhookController::class, 'handleWebhook']);
