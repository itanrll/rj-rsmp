<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('register');
    }

    public function registerAction(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'password' => 'required|confirmed|min:6',
            'role' => 'required|in:petugas,pasien',
        ]);

        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }
}
