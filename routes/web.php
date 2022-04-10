<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'process']);

Route::get('/email-verification', function() {
    abort(403);
    return view('verification-notice');
})->middleware('auth')->name('verification.notice');
Route::get('/email-verification/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email-verification', function(Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Tautan verifikasi dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'process']);

Route::middleware('auth')->group(function() {
	Route::get('/notes', [NotesController::class, 'redirector']);
	Route::get('/notes/{folder_id}', [NotesController::class, 'index']);
	Route::post('/notes/new/{type}', [NotesController::class, 'newNode']);
	Route::post('/notes/edit/{type}', [NotesController::class, 'editNode']);
	Route::post('/notes/edit/{note_id}/save', [NotesController::class, 'editNoteSave']);
	Route::get('/notes/edit/{note_id}', [NotesController::class, 'editNote']);
	Route::get('/notes/delete/{type}/{id}', [NotesController::class, 'deleteNode']);

	Route::get('/logout', [LoginController::class, 'logout']);
});
