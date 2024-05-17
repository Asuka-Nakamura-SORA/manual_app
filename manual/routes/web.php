<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;

Route::get('/register', [UserController::class, 'showRegister'])->name('register');

Route::post('/register',[UserController::class,'register']);

Route::middleware('auth')->group(function (){
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
});

Route::post('logout',[UserController::class,'logout'])->name('user.logout');

Route::get('/',[UserController::class,'showLogin'])->name('login');

Route::post('/',[UserController::class,'login']);