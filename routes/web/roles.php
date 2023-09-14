<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\RoleController;
Route::get('/roles', [RoleController::class, 'index'])->name('roles.index');
Route::post('/roles', [RoleController::class, 'store'])->name('store.index');
