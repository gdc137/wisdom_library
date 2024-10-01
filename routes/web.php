<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/{pathMatch}', function () {
    return view('home');
})->where('pathMatch', '.*');

Auth::routes();

// Route::get('/home2', [HomeController::class, 'index2'])->name('home2');
