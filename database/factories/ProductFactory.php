<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'description' => fake()->paragraph(),
            'purchase_price' => fake()->randomFloat(2, 10, 100),
            'sale_price' => fake()->randomFloat(2, 10, 100),
            'quantity' => fake()->randomNumber(3, true),
            'image' => fake()->randomElement(['fish.jpg', 'fruits.jpg', 'meats.jpg', 'vegetables.jpg', 'package.jpg', 'frozen.jpg' ]),
            'category_id' => fake()->numberBetween(1, 6)
        ];
    }
}
