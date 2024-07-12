<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    // public function __construct() {
    //     $this->middleware('guest');
    // }

    public function view_register()
    {
        return view('Permission.register');
    }
    public function store_register(Request $request)
    {   
        try{
            $request->validate([
                'name' => 'required',
                'username' => 'required|unique:users',
                'email' => 'required|unique:users',
                'password' => 'required|min:8',
            ]);

            User::create([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return ['status' => true, 'pesan' => 'Registrasi Berhasil Dilakukan'];
            return redirect()->route('login');
        }catch(\Exception $e){
            return ['status' => false, 'error' => $e->getMessage()];
        }
        
    }
    public function view_login()
    {
        return view('Permission.login');
    }
    public function login_verif(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ], [
                'email.required' => 'email tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'email.email' => 'Format email harus benar'
            ]);
    
            if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('dashboard.index');
            }elseif(Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');
            }elseif(Auth::guard('member')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('dashboard-member.index');
            }else{
                return redirect()->route('login')->with('error', 'silahkan cek kembali password atau email yang anda input');
            }
        } catch(\Exception $e) {
            dd($e);
        }
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        Auth::guard('member')->logout();
        return redirect()->route('login');
    }
}