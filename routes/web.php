<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/admin/users/{user}/profile', [UserController::class, 'show'])->name('user.profile.show');
Route::put('/admin/users/{user}/update', [UserController::class, 'update'])->name('user.profile.update');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(function (){
    Route::get('/admin', [AdminsController::class, 'index'])->name('admin.index');
    Route::get('/admin/posts/', [PostController::class, 'index'])->name('post.index');
    Route::get('/admin/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('post.store');
    
    Route::delete('/admin/posts/{post}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
    Route::patch('/admin/posts/{post}/update', [PostController::class, 'update'])->name('post.update');
    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
});
