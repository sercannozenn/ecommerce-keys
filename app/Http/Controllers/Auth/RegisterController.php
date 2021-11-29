<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function __construct()
    {
    }

    public function showRegister()
    {
        if (Session::has('withoutRegistration'))
        {
            return redirect()->route('checkout');
        }
        return view('front.auth.login-register');
    }
}
