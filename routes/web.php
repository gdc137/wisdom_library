<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth::routes();

// admin routes 
require __DIR__ . '/admin.php';

Route::get('/{pathMatch}', function () {
    return view('home');
})->where('pathMatch', '.*');
