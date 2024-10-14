<?php

use App\Http\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/register', [UserController::class, 'register']);
Route::post('/supplier/store', [SupplierController::class, 'store']);
Route::get('/supplier/all', [SupplierController::class, 'index']);