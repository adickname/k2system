<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('products', ProductController::class);

Route::get('/', function () {
    return 'API';
});

Route::post('/add-acount', [AuthController::class, 'addAcount']);
Route::post('/delete-acount', [AuthController::class, 'deleteAcount'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
