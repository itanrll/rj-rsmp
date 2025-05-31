<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\RegisterController;

Route::get('/', function () {
    return view('landing');
});

// Login
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');        // halaman login
Route::post('/actionlogin', [LoginController::class, 'loginaction'])->name('actionlogin'); // proses login

// Register
Route::get('/register', [RegisterController::class, 'showRegister'])->name('register');  // halaman register
Route::post('/register', [RegisterController::class, 'registerAction'])->name('register.action'); // proses register

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');


Route::resource('login', LoginController::class);

Route::resource('dokter', DokterController::class);
Route::delete('/dokter/{id}', [DokterController::class, 'destroy'])->name('dokter.destroy');

Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
Route::post('/dokter', [DokterController::class, 'store'])->name('dokter.store');
Route::resource('pasien', PasienController::class);
Route::resource('pendaftaran', PendaftaranController::class);
Route::get('/pendaftaran-sukses', [PendaftaranController::class, 'sukses'])->name('sukses');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::resource('admin', AdminController::class);
