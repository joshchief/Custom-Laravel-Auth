<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;


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
    return view('home');
});

// auth routes
Route::get('/register', [RegisterController::class, 'createUser']);
Route::post('/register', [RegisterController::class, 'storeUser']);

Route::get('/login', [LoginController::class, 'loginForm']);
Route::post('/login', [LoginController::class, 'loginUser']);
Route::get('/logout', [LoginController::class, 'logout']);

// E-mail verification
Route::get('/verify/{token}', [RegisterController::class, 'verifyEmail']);

// Password Reset
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forget.password.get')->middleware('guest');
Route::post('forgot-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

