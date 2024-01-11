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
            'title' => $this->faker->words(3, true),
            'slug' => $this->faker->unique()->slug,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'sale_price' => $this->faker->randomFloat(2, 1, 1000),
            'description' => $this->faker->paragraphs(3, true),
            'image' => $this->faker->imageUrl(640, 480, 'animals', true),
            'featured' => $this->faker->boolean(20),
            'active' => $this->faker->boolean(80),
        ];
    }
}
