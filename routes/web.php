<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});
Route::get('/', function () {
    return view('admin/dashboard');
});
Route::get('/login', function () {
    return view('login');
});