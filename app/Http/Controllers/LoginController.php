<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/dashboard')->with('success', 'Selamat Datang di Halaman Dashboard');
        }

        return back()->with('error', 'Username dan Password Salah');
    }
    
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
 
        $request->session()->regenerateToken();
     
        return redirect('/')->with('success', 'Berhasil Logout');
    }
}
