<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Route::view('/sobre', 'site.about');
Route::get('/sobre', [AboutController::class, 'index'])->name('about.index');

Route::get('/artigos', [PostController::class, 'index'])->name('post.index');
Route::get('/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('/artigo/{post}', function(string $post) {
    return redirect("/{$post}");
});

Route::get('/categoria/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/autor/{userID}', [AuthorController::class, 'show'])->name('author.show');
