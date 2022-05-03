<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $fields = $request->validated();
        $fields['password'] = Hash::make($request->password);
        $user = User::create($fields);
        Auth::login($user);
        return redirect('/')->with('message', 'You a registered and login');
    }

    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        $fields = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);
        if (Auth::attempt($fields)) {
            $request->session()->regenerate();

            return redirect('/');
        }
        return back()->withErrors(['email' => 'Invalid email or password'])->onlyInput('email');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function logout(
    ): \Illuminate\Routing\Redirector|\Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('/');
    }

}
