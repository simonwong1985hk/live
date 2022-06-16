<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title, '-');
        $body = $this->faker->paragraph;
        $user_id = User::all()->random();
        $category_id = Category::all()->random();

        return [
            'title' => $title,
            'slug' => $slug,
            'body' => $body,
            'user_id' => $user_id,
            'category_id' => $category_id,
        ];
    }
}
