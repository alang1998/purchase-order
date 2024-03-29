<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        if(!empty(auth()->user()->id)){
            return redirect()->route('dashboard');
        }
        return view('pages.auth.login', [
            'title' => 'Login'
        ]);
    }

    public function postlogin(LoginRequest $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password, 'status' => '1'])) {
            return redirect()->route('dashboard');
        } else {
            return redirect()->back()->with('error', 'Username atau Password Salah!');
        }
    }

    public function logout()
    {
        $message = session('success') ?? 'Terimakasih telah menggunakan sistem ini.';
        Auth::logout();
        return redirect()->route('login')->with('success', $message);
    }
}
