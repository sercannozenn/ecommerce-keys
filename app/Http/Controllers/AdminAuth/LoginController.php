<?php

namespace App\Http\Controllers\AdminAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class LoginController extends Controller
{
    public string $redirectTo = '/admin';

    public function showLoginForm(): View
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
        $data = $request->only($this->username(), 'password');

        $user = Auth::attempt([$this->username() => $data[$this->username()], 'password' => $data['password']]);
        if ($user)
        {
            return redirect()->route('admin.index');
        }


        return redirect()->back()->withErrors(['user_not_found' => 'Kullanıcı bulunamadı'])->withInput();
    }

    public function username(): string
    {
        return 'email';
    }

    public function logout()
    {
        Auth::logout();

        return redirect($this->redirectTo);
    }
}
