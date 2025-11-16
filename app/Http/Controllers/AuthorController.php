<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function show(string $userID)
    {
        return view('site.author', [
            'author' => User::where('id', $userID)->first(),
            'posts' => (new Post)->postsByUser($userID),
        ]);
    }
}
