<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CartController;

// Route::get('/', [RoomController::class, 'index']);
// Route::post('/add-to-cart', [CartController::class, 'addToCart']);
// Route::post('/remove-from-cart', [CartController::class, 'removeFromCart']);
// Route::post('/update-cart', [CartController::class, 'updateCart']);
// Route::post('/checkout', [CartController::class, 'checkout']);
// Route::resource('rooms', RoomController::class);


Route::get('/', [CartController::class, 'index']);
Route::post('/add-to-cart', [CartController::class, 'addToCart']);
Route::post('/remove-from-cart', [CartController::class, 'removeFromCart']);
Route::post('/update-cart', [CartController::class, 'updateCart']);
Route::post('/checkout', [CartController::class, 'checkout']);
Route::resource('rooms', RoomController::class);