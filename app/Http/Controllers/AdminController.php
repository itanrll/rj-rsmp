<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class AdminController extends Controller
{
    public function index() {
        $pendaftaran = Pendaftaran::with(['pasien', 'dokter'])->get();


        return view('admin.dashboard', compact('pendaftaran'));
    }

    
}
