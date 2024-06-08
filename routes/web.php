<?php

use App\Http\Controllers\BooksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Models\Mahasiswa;

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserController;

// Post, Get, Put, Delete

Route::resource('/books', BooksController::class);

Route::get('/', [BooksController::class, 'index'])->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('register', function () {
    return view('auth.register');
})->name('register');
Route::post('register', [UserController::class, 'store']);

Route::post('/logout', LogoutController::class, 'authenticate')->middleware('auth');
