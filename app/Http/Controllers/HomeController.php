<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $category = Category::all();

        // dd($category);

        return view('site.home', [
            'posts4' => (new Post)->posts4(),
            'categories' => Category::all()
        ]);
        
    }
}
