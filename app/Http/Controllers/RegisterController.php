<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index() {
        return view('register');
    }

    public function process(Request $request) {
        $userName = $request->input('name');
        $userEmail = $request->input('email');
        $userPassword = $request->input('password');

        $duplication = User::where('email', $userEmail)->get();
        if ($duplication->count()) {
            return back()->withErrors([
                'email' => 'Email sudah digunakan oleh pengguna lain'
            ])->onlyInput('name');
        }

        User::create([
            'name' => $userName,
            'email' => $userEmail,
            'password' => bcrypt($userPassword)
        ]);

        return redirect('/notes');
    }
}
