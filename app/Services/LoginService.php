<?php

namespace App\Services;

use App\Models\AdminModel;
use App\Models\OrangTua;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use App\Models\Siswa;
class LoginService
{
    public function loginweb($request)
    {
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password'],
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // dd($user->role);

            
            // Simpan data tambahan ke session
            session([
                'user' => [
                    'username' => $user->username,
                    'role' => $user->role,
                ]
            ]);
            // dd(session('user'));
            if ($user->role === 'pasien') {
            return redirect()->route('pendaftaran.index');
            } else {
                return redirect()->route('admin.index');
            }
        } else {
            // Cek apakah NIP ada
            $existingNip = User::where('username', $request['username'])->exists();
            if ($existingNip) {
                return ['status' => 'password_error', 'message' => 'Password salah'];
            } else {
                return ['status' => 'account_not_found', 'message' => 'Akun tidak ditemukan'];
            }
        }
    }
    

    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    
}
