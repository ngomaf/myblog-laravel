<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(): object
    {
        return view('site.about', [
            'totPosts' => Post::where('state', 1)->count(),
            'totCats' => Category::count(),
            'totAuthors' => User::count(),
            'totViews' => Post::where('state', true)->sum('views'),
        ]);
    }
}
