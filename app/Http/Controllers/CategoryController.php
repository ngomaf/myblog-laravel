<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(string $slug)
    {
        return view('site/category', [
            'category' => Category::where('slug', $slug)->first(),
            'posts' => (new Post)->postsByCat($slug, 6)
        ]);
    }
}
