<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MakersController;

Route::get('/register', [UserController::class, 'showRegister'])->name('register');

Route::post('/register',[UserController::class,'register']);

Route::middleware('auth')->group(function (){
    Route::get('/profile',[UserController::class,'profile'])->name('profile');
});

Route::post('logout',[UserController::class,'logout'])->name('user.logout');

Route::get('/',[UserController::class,'showLogin'])->name('login');

Route::post('/',[UserController::class,'login']);

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::post('/posts/create', [PostController::class, 'store']); 

Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');

Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

Route::get('/maker/index', [MakersController::class, 'index'])->name('maker.index');

Route::post('/maker', [MakersController::class, 'store'])->name('maker.store');
