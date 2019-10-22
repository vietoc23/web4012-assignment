<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('frontpage.register.register');
    }

    public function store(RegisterRequest $request)
    {
        User::create($request->except('password_confirmation'));

        return redirect()->route('front.index');
    }
}
