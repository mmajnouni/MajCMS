<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminsController::class, 'index'])->name('admin.index');
Route::get('/admin/users/{user}/profile', [UserController::class, 'show'])->name('user.profile.show');
Route::put('/admin/users/{user}/update', [UserController::class, 'update'])->name('user.profile.update');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post');
