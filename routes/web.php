<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminsController;
use App\Http\Controllers\UserController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminsController::class, 'index'])->name('admin.index');
Route::get('/admin/users/{user}/profile', [UserController::class, 'show'])->name('user.profile.show');
