<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProdukController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('/category', CategoryController::class);
Route::apiResource('/produk', ProdukController::class);