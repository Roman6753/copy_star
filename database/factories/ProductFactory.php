<?php

namespace Database\Factories;

use App\Models\Category;
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
            'name' => $this->faker->sentence(3),
            'slug' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 1000, 50000),
            'stock' => $this->faker->numberBetween(0, 100),
            'country' => $this->faker->country,
            'year' => $this->faker->year,
            'model' => $this->faker->bothify('??-####'),
            'category_id' => Category::factory(),
        ];
    }
}
