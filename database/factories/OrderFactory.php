<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::all()->pluck('id')->random(),
            'book_id' => Book::all()->pluck('id')->random(),
            'price' => fake()->randomDigit(),
            'days' => fake()->randomDigit(),
            'quantity' => fake()->randomDigit()
        ];
    }
}
