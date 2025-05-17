<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function register(Request $request) {
        $minta = $request->validate([
            'name' => ['required', ],
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        $minta['password'] = bcrypt($minta['password']);
        $user = User::create($minta);
        auth() ->login($user);
        return redirect('/')->with('success', 'Registration successful');
    }

    public function login(Request $request) {
        $minta = $request->validate([
            'login-name' => 'required',
            'login-password' => 'required',
        ]);

        if (auth()->attempt(['name'=>$minta['login-name'], 'password' => $minta['login-password']])) {
            $request->session()->regenerate();
        }

        return redirect('/')->with('error', 'Login failed');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }

}
