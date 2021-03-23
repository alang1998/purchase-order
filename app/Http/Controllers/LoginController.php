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
        return view('pages.auth.login');
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
        Auth::logout();
        return redirect('/')->with('success', 'Terima kasih telah menggunakan sistem ini.');
    }
}
