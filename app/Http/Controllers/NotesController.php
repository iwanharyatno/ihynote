<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotesController extends Controller
{
    public function index() {
        $user = Auth::user();

        return view('notes.index', [
            'user' => $user
        ]);
    }
}