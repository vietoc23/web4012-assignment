<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function getLoginForm()
    {
        return view('frontpage.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');

        // dd($credentials);
        
        if (Auth::attempt($credentials)) {
            // dd(1);
            return redirect()->intended('/');
        }

        return redirect()->back();
    }

    public function signout()
    {
        Auth::logout();

        return redirect()->route('front.index');
    }
}
