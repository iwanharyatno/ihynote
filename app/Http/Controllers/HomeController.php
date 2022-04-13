<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    function index() {
	    if (Auth::user()) {
	        return redirect('/notes');
	    }
	    
	    return view('home.welcome');
	}

    function about() {
        return view('home.about');
    }
}
