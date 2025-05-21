<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;


Route::get('/audisi', [RegisterController::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/peserta/{id}', [AdminController::class, 'show']);
    Route::post('/admin/update-status/{id}', [AdminController::class, 'updateStatus']);


});
Route::post('/mfh', [RegisterController::class, 'store'])->name('register.store');
Route::post('/get-cities-by-province', [RegisterController::class, 'getCitiesByProvince']);