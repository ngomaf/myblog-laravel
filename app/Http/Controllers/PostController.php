<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('site.posts', [
            'pages' => (new Post)->pager(10)
            // 'pages' => Post::paginate(10)
        ]);
    }

    public function show(string $slug): string
    {
        Post::where('slug', $slug)->increment('views');
        
        return view('site.post', [
            'post' => (new Post)->post($slug)
        ]);
    }
}
