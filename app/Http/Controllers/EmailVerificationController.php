<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailVerificationController extends Controller
{
    public function notice() {
        $user = Auth::user();
        if ($user->hasVerifiedEmail()) {
            return redirect('/notes');
        }
        return view('verification-notice', [
            'user' => $user
        ]);
    }

    public function verify(EmailVerificationRequest $request) {
	    $request->fulfill();
	
	    return redirect('/notes');
    }

    public function resend(Request $request) {
	    $request->user()->sendEmailVerificationNotification();
	
	    return back()->with('message', 'Tautan verifikasi dikirim!');
    }

    public function changeEmail(Request $request) {
        $user = $request->user();
        $user->email = $request->input('email');
        $user->save();

        $user->sendEmailVerificationNotification();

	    return back()->with('message', 'Tautan verifikasi dikirim!');
    }
}
