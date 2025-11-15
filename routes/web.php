<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/sobre', 'site.about');

Route::get('/artigos', [PostController::class, 'index'])->name('post.index');
Route::get('/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('/artigo/{post}', function(string $post) {
    return redirect("/{$post}");
});

Route::get('/categoria/{category}', function(string $category) {
    return "<h1>Categoria: {$category}</h1>";
});
