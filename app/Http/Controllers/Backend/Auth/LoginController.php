<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('backend.auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->credentials();

        if (Auth::attempt($credentials, $request->remember())) {
            $request->session()->regenerate();
            return redirect()->intended(route('backend.index'))
                ->withSuccess('Giriş Başarılı Hoş geldin' . ' ' . auth()->user()->name . '!');
        }
        return back()->withErrors([
            'email' => 'E-posta veya şifre hatalı.'
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('home')->withSuccess('Çıkış yapıldı.');
    }
}
