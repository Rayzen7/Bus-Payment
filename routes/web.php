<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'indexLogin'])->name('indexLogin');
Route::post('/', [AuthController::class, 'login'])->name('login-post');

Route::get('/register', [AuthController::class, 'indexRegister'])->name('indexRegister');
Route::post('/register', [AuthController::class, 'register'])->name('register-post');

Route::middleware('authentication')->group(function() {
    Route::post('/dashboard', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [BusController::class, 'index'])->name('indexDashboard');
    Route::get('/dashboard/payment/{id}', [BusController::class, 'show'])->name('indexPayment');
    Route::post('/dashboard/payment/{id}', [PaymentController::class, 'store'])->name('payment-post');
    Route::get('/dashboard/history', [PaymentController::class, 'index'])->name('indexHistory');
});