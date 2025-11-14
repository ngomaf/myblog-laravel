<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // dd((new Post)->posts4());
        return view('site.home', [
            'posts4' => (new Post)->posts4()
        ]);
        
    }
}
