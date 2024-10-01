<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/{pathMatch}', function () {
    return view('home');
})->where('pathMatch', '.*');

Auth::routes();

// user routes 
require __DIR__ . '/admin.php';
