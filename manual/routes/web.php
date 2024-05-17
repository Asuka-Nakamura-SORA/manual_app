<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\UserController::class,'showRegister']);

Route::post('/',[\App\Http\Controllers\UserController::class,'register']);

Route::middleware('auth')->group(function (){
    Route::get('/profile',[\App\Http\Controllers\UserController::class,'profile'])->name('profile');

    Route::post('logout',[\App\Http\Controllers\UserController::class,'logout'])->name('user.logout');
});

