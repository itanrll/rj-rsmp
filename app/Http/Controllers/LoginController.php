<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoginService;
use App\Models\Role;
class LoginController extends Controller
{
    protected $loginService;
    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }   

    public function index()
    {
        // $roles = Role::all();
        return view('login');
    }

    public function loginaction(Request $request)
    {
        // return ('masuk ke fungsi');
        // dd($request->all());
        // Validasi input request
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        // dd($request->all());
        // Panggil service untuk login
        $result = $this->loginService->loginweb($request);
        // dd($result);
        if(is_array($result)){
            switch ($result['status']) {
                case 'password_error':
                    return redirect()->back()->with('error', $result['message'])->withInput(['nik_pegawai' => $request->nik_pegawai]);
                case 'nik_error':
                    return redirect()->back()->with('error', $result['message']);
                case 'account_not_found':
                    return redirect()->back()->with('error', $result['message']);
            }
        }else{
            // dd($result);
            return $result;
        }

        // Jika login berhasil, redirect ke halaman dashboard
        // if($result){
            // $data = $result;
            // $request->session()->regenerate();
            // return redirect()->route('dashboard')->with('success', 'Login berhasil');

        // }
    }

    public function logout(Request $request)
    {
        // Hapus session user
        $request->session()->forget('user');
        $request->session()->flush();

        // Redirect ke halaman login
        return redirect()->route('register')->with('success', 'Logout berhasil');
    }
}
