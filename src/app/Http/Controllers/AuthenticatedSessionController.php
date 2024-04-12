<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController as FortifyAuthenticatedSessionController;
use Laravel\Fortify\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Route; // RouteServiceProviderをインポート
use App\Providers\RouteServiceProvider; // RouteServiceProviderをインポート
use Illuminate\Support\Facades\Auth; // Authファサードをインポート

class AuthenticatedSessionController extends FortifyAuthenticatedSessionController
{
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
