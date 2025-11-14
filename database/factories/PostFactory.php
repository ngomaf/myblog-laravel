<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->unique()->paragraph();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'state' => 1,
            'content' => $this->faker->text,
            'views' => $this->faker->randomNumber(5),
            'id_user' => User::pluck('id')->random(),
            'id_category' => Category::pluck('id')->random()
        ];
    }
}
