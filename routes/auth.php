<?php

use Illuminate\Support\Facades\Route;

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


Route::name('auth.')->prefix('auth')/*->middleware(['auth', 'check.permission'])*/->group(function () {
    Route::get('/',[App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('index');
    Route::post('/login',[App\Http\Controllers\Auth\LoginController::class,'login'])->name('login');
    Route::get('/register',[App\Http\Controllers\Auth\RegisterController::class,'showRegister'])->name('register');
    Route::post('/register-store',[App\Http\Controllers\Auth\RegisterController::class,'registerStore'])->name('register.store');

    //Changement mot de passe
    Route::get('/forgot-password',[App\Http\Controllers\Auth\ForgotPasswordController::class,'index'])->name('forgot.password.email');
    Route::post('/forgot-password',[App\Http\Controllers\Auth\ForgotPasswordController::class,'verifyEmail'])->name('forgot.password.store');
    Route::get('/reset-password',[App\Http\Controllers\Auth\ForgotPasswordController::class,'resetPassword'])->name('reset.password');
    Route::post('/reset-password',[App\Http\Controllers\Auth\ForgotPasswordController::class,'resetPasswordPost'])->name('reset.password.post');

   
});
