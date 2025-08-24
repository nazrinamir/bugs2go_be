<?php

namespace App\Http\Controllers\AuthControllers;

use Auth;
use Illuminate\Http\Request;

class LoginController
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('auth.register');
    }
    
}
