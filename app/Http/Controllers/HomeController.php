<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categorias = (new Category)->getCategoriesWithCount();

        return view('site.home', [
            'posts4' => (new Post)->posts4(),
            'categories' => $categorias
        ]);        
    }
}
