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
        $title = $this->faker->unique()->sentence();

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'state' => 1,
            'content' => $this->generateHtmlContent(),
            // 'content' => $this->text,
            'views' => $this->faker->randomNumber(5),
            'id_user' => User::pluck('id')->random(),
            'id_category' => Category::pluck('id')->random()
        ];
    }

    private function generateHtmlContent()
    {
        $html = "";
        $tot = random_int(2,5);

        // Criar 3 seções
        for ($i = 0; $i < $tot; $i++) {
            $html .= "<h2>" . $this->faker->sentence() . "</h2>";
            $html .= "<p>" . $this->faker->text . "</p>";
            $html .= "<p>" . $this->faker->text . "</p>";

            $html .= "<h3>" . $this->faker->sentence() . "</h3>";
            $html .= "<ul>";

            for ($j = 0; $j < 4; $j++) {
                $html .= "<li>" . $this->faker->paragraph() . "</li>";
            }

            $html .= "</ul>";
            $html .= "<p>" . $this->faker->paragraph(3) . "</p>";
            $html .= "<p>" . $this->faker->text . "</p>";
            $html .= "<p>" . $this->faker->text . "</p>";
        }

        return $html;
    }

}
