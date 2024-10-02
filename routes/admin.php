<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;

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
    Route::get('/_admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
