<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Folder;

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

        $user = User::create([
            'name' => $userName,
            'email' => $userEmail,
            'password' => bcrypt($userPassword)
        ]);

        $folder = Folder::create([
            'user_id' => $user->id,
            'name' => $user->id . '-root',
            'description' => $user->id . '-root-folder'
        ]);

        Auth::login($user);

        return redirect('/notes/' . $folder->id);
    }
}
