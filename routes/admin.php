<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\LanguageController;

// Authentication Routes...
Route::get('/_admin', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/_admin/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/_admin/logout', [LoginController::class, 'logout'])->name('logout');

// Password Reset Routes...
Route::get('/_admin/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/_admin/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/_admin/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/_admin/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/_admin/dashboard', [AdminController::class, 'index']);

    // languages 
    Route::get('/_admin/languages', [LanguageController::class, 'index']);
    Route::get('/_admin/languages/get', [LanguageController::class, 'get']);
    Route::post('/_admin/languages', [LanguageController::class, 'store']);
    Route::get('/_admin/languages/{id}/edit', [LanguageController::class, 'edit']);
    Route::put('/_admin/languages/{id}', [LanguageController::class, 'update']);
    Route::delete('/_admin/languages/{id}', [LanguageController::class, 'destroy']);
    Route::patch('/_admin/languages/{id}/status', [LanguageController::class, 'changeStatus']);
});
