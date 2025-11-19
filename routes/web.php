<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes using AuthController
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::resource('siswa', SiswaController::class)->middleware('auth');
Route::resource('lembaga', LembagaController::class)->middleware('auth');


Route::get('siswa-export', [App\Http\Controllers\SiswaController::class, 'export'])->name('siswa.export')->middleware('auth');
