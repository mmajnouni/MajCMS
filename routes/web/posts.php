<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
Route::get('/post/{post}', [PostController::class, 'show'])->name('post');

Route::middleware(['auth'])->group(function (){
    Route::get('/posts/', [PostController::class, 'index'])->name('post.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/posts', [PostController::class, 'store'])->name('post.store');
    Route::delete('/posts/{post}/destroy', [PostController::class, 'destroy'])->name('post.destroy');
    Route::patch('/posts/{post}/update', [PostController::class, 'update'])->name('post.update');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
});

