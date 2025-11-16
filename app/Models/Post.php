<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    /** @use HasFactory<\Database\Factories\PostFactory> */
    use HasFactory;

    // Relação: um post pertence a um usuário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relação: um post pertence a uma cateogria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function posts4()
    {
        return DB::table('posts')
            ->join('users', 'posts.id_user', '=', 'users.id')
            ->join('categories', 'posts.id_category', '=', 'categories.id')
            ->select(
                'posts.*', 
                'users.id as user_id', 
                'users.firstName', 
                'users.lastName', 
                'users.email', 
                'categories.name as cat_name', 
                'categories.slug as cat_slug'
            )
            ->where('posts.state', '=', '1')
            ->limit(4)
            ->get();
    }

    public function pager(int $tam=10): object
    {
        return DB::table('posts')
            ->join('users', 'posts.id_user', '=', 'users.id')
            ->join('categories', 'posts.id_category', '=', 'categories.id')
            ->select(
                'posts.*', 
                'users.id as user_id', 
                'users.firstName', 
                'users.lastName', 
                'users.email', 
                'categories.name as cat_name', 
                'categories.slug as cat_slug'
            )
            ->where('posts.state', '=', 1)
            ->orderBy('posts.created_at', 'desc')
            ->paginate($tam);
    }

    public function postsByCat(string $slug, int $tam = 10): object
    {
        return DB::table('posts')
            ->join('users', 'posts.id_user', '=', 'users.id')
            ->join('categories', 'posts.id_category', '=', 'categories.id')
            ->select(
                'posts.*', 
                'users.id as user_id', 
                'users.firstName', 
                'users.lastName', 
                'users.email', 
                'categories.name as cat_name', 
                'categories.slug as cat_slug'
            )
            ->where('posts.state', '=', 1)
            ->where('categories.slug', '=', $slug)
            ->orderBy('posts.created_at', 'desc')
            ->paginate($tam);
    }

    public function postsByUser(string $userID, int $tam = 10): object
    {
        return DB::table('posts')
        ->join('users', 'posts.id_user', '=', 'users.id')
        ->join('categories', 'posts.id_category', '=', 'categories.id')
        ->select(
            'posts.*',
            'users.id as user_id',
            'users.firstName',
            'users.lastName',
            'users.email',
            'categories.name as cat_name',
            'categories.slug as cat_slug',
        )
        ->where('posts.state', '=', 1)
        ->where('users.id', '=', $userID)
        ->orderBy('posts.created_at', 'desc')
        ->paginate($tam);
    }

    public function post(string $slug)
    {
        return DB::table('posts')
            ->join('users', 'posts.id_user', '=', 'users.id')
            ->join('categories', 'posts.id_category', '=', 'categories.id')
            ->select(
                'posts.*', 
                'users.id as user_id', 
                'users.firstName', 
                'users.lastName', 
                'users.email', 
                'categories.name as cat_name', 
                'categories.slug as cat_slug'
            )
            ->where('posts.slug', '=', $slug)
            ->first();
    }
}
