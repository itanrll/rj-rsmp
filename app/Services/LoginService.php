<?php

namespace App\Services;

use App\Models\AdminModel;
use App\Models\OrangTua;
use App\Models\Pegawai;
use Illuminate\Support\Facades\Auth;
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
    
            // Simpan data tambahan ke session
            session([
                'user' => [
                    'username' => $user->username,
                ]
            ]);
            // dd(session('user'));
            return $user;
        } else {
            // Cek apakah NIP ada
            $existingNip = AdminModel::where('username', $request['username'])->exists();
            if ($existingNip) {
                return ['status' => 'password_error', 'message' => 'Password salah'];
            } else {
                return ['status' => 'account_not_found', 'message' => 'Akun tidak ditemukan'];
            }
        }

        // $ceklogin = Pegawai::where('nik_pegawai',$request['nik_pegawai'])->first();
        // if($ceklogin != null){
        //     if(Hash::check($request['password'],$ceklogin->password)){
        //         session(['user' => $ceklogin]);
        //         return $ceklogin;
        //     } else {
        //         return ['status' => 'password_error', 'message' => 'Password salah'];
        //     }
        // } else {
        //     // Cek apakah NIP sudah pernah terdaftar
        //     $existingNip = Pegawai::where('nik_pegawai', 'like', $request['nik_pegawai'])->exists();

        //     if ($existingNip) {
        //         return ['status' => 'nik_error', 'message' => 'NIP salah'];
        //     } else {
        //         return ['status' => 'account_not_found', 'message' => 'Akun tidak ditemukan'];
        //     }
        // }
    }
    

    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    
}
