<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;

Route::get('/', [LoginController::class, 'index'])->name('loginh');

Route::post('login', [LoginController::class, 'login'])->name('login');

Route::get('home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// routes/web.php
Route::get('/signup', [SignupController::class, 'showSignupForm'])->name('signup');
Route::post('register', [SignupController::class, 'register'])->name('register');
//Route::post('/signup', 'SignupController@register');


