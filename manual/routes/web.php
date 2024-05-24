<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MakersController;

Route::get('/register', [UserController::class, 'showRegister'])->name('register');

Route::post('/register',[UserController::class,'register']);

Route::middleware('auth')->group(function (){
    Route::get('/profile',[UserController::class,'profile'])->name('profile');

    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');

    Route::post('/posts/create', [PostsController::class, 'store']); 

    Route::get('/posts', [PostsController::class, 'index'])->name('posts.index');

    Route::get('/category/index', [CategoryController::class, 'index'])->name('category.index');

    Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/maker/index', [MakersController::class, 'index'])->name('maker.index');

    Route::post('/maker', [MakersController::class, 'store'])->name('maker.store');

    Route::post('logout',[UserController::class,'logout'])->name('user.logout');

    Route::get('/posts/{id}', [PostsController::class, 'show'])->name('posts.show');

    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');

});

Route::get('/',[UserController::class,'showLogin'])->name('login');

Route::post('/',[UserController::class,'login']);