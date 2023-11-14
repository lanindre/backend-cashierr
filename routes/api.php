<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:admin'])->group(function(){
});
Route::apiResource('/category', CategoryController::class);
Route::apiResource('/produk', ProdukController::class);
Route::apiResource('/user', UsersController::class);
Route::post('/login', [AdminAuthController::class, 'login']);
