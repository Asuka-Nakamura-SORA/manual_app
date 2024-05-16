<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register',[\App\Http\Controllers\UserController::class,'showRegister']);

Route::post('/register',[\App\Http\Controllers\UserController::class,'register']);

Route::middleware('auth')->group(function (){
    Route::get('/profile',[\App\Http\Controllers\UserController::class,'profile'])->name('profile');
});