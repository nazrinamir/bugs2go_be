<?php

use App\Http\Requests\LoginRequest;

class LoginService
{
    public function login(LoginRequest $request)
    {
        $this->validateEmailAndPasswordOrFail($request);

        $token = $this->createTokenOrFail($request);

        if ($this->isExpired($request)) {
            $this->refreshTokenOrFail($request);
        }

        return $token;
    }

    private function validateEmailAndPasswordOrFail(LoginRequest $request)
    {
        $request->validate(LoginRequest::rules());

        if (!Auth::attempt($request->only('email', 'password'))) {
            throw new \Exception('Invalid credentials');
        }

        return $request;
    }

    private function createTokenOrFail(LoginRequest $request)
    {
        return $request->user()->createToken('auth_token')->plainTextToken;
    }

    private function isExpired(LoginRequest $request)
    {
        return $request->user()->token()->expires_at < now();
    }

    private function refreshTokenOrFail(LoginRequest $request)
    {
        return $request->user()->token()->refresh();
    }




}