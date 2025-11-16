<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    public $timestamps = false;

    // Relação: uma categoria tem muitos posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getCategoriesWithCount()
    {
        return  DB::table('categories')
            ->leftJoin('posts', 'categories.id', '=', 'posts.id_category')
            ->select('categories.id', 'categories.name', 'categories.slug', 'categories.description', DB::raw('COUNT(posts.id) as total_posts'))
            ->groupBy('categories.id', 'categories.name', 'categories.slug', 'categories.description')
            ->get();
    }
}
