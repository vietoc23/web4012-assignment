<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers, ThrottlesLogins;

    public function loginForm()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        // $this->clearLoginAttempts($request);
        // dd($credentials, $this->attemptLogin($request));
        if (Auth::attempt($credentials)) {
            return redirect()->intended('admin/dashboard');
        }

        return redirect()->back();
    }
}
