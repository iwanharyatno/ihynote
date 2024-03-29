<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'process']);

Route::get('/email-verification', [EmailVerificationController::class, 'notice'])->middleware('auth')->name('verification.notice');
Route::get('/email-verification/{id}/{hash}', [EmailVerificationController::class, 'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email-verification', [EmailVerificationController::class, 'resend'])->middleware(['auth', 'throttle:6,1'])->name('verification.send');
Route::post('/email-verification/change-email', [EmailVerificationController::class, 'changeEmail'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'process']);

Route::middleware(['auth', 'verified'])->group(function() {
	Route::get('/notes', [NotesController::class, 'redirector']);
	Route::get('/notes/{folder_id}', [NotesController::class, 'index']);
	Route::post('/notes/new/{type}', [NotesController::class, 'newNode']);
	Route::post('/notes/edit/{type}', [NotesController::class, 'editNode']);
	Route::post('/notes/edit/{note_id}/save', [NotesController::class, 'editNoteSave']);
	Route::get('/notes/edit/{note_id}', [NotesController::class, 'editNote']);
	Route::get('/notes/delete/{type}/{id}', [NotesController::class, 'deleteNode']);
    Route::get('/notes/move/{type}/{id}', [NotesController::class, 'moveNodeRequest']);
    Route::post('/notes/move', [NotesController::class, 'moveNode']);

	Route::get('/logout', [LoginController::class, 'logout']);
});
