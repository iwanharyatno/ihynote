<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        if (Auth::user()) {
            return redirect('/notes');
        }

        return view('login');
    }

    public function process(Request $request) {
        $credetials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credetials, !!$request->input('remember'))) {
            $request->session()->regenerate();

            return redirect()->intended('/notes');
        }

        return back()->withErrors([
            'email' => 'Data yang diberikan tidak cocok dengan rekord kami'
        ])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/notes');
    }
}
