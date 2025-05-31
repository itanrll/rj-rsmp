<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('landing');
});
Route::post('/actionlogin', [LoginController::class, 'loginaction'])->name('actionlogin');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::get('/login', function () {
    return view('login');
});

Route::resource('dokter', DokterController::class);
Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');