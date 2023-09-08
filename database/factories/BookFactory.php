<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->lastName(2),
            'slug' => fake()->slug(1),
            'category_id' => null,
            'author_id' => null,
            'thumbnail' => null,
            'price' => fake()->randomDigit()
        ];
    }
}
