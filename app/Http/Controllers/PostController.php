<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('site.posts', [
            'pages' => Post::paginate(10)
        ]);
    }

    public function show(string $slug)
    {
        $post = (new Post)->post($slug);
        
        return view('site.post', [
            'post' => $post
        ]);
    }
}
