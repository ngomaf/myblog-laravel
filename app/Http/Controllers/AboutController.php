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
            'totPosts' => Post::count(),
            'totCats' => Category::count(),
            'totAuthors' => User::count(),
            'totViews' => Post::sum('views'),
        ]);
    }
}
