<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Requests\LoginRequest;
use Auth;
use LoginService;

class LoginController
{
    private LoginService $loginService;

    public function __construct(LoginService $loginService)
    {
        $this->loginService = $loginService;
    }

    public function login(LoginRequest $request)
    {
        $token = $this->loginService->login($request);
        return response()->json(['token' => $token]);
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
