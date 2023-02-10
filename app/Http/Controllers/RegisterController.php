<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    

    public function register(Request $request) 
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'type' => 'required',
            'password' => 'required|min:6|max:20|confirmed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        // $user->assignRole($request->input('roles'));

        return redirect('/')->withToastSuccess('Registrasi Berhasil');

    }
}
