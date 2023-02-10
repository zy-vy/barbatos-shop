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
    public function definition()
    {
        return [
            //
            'name' => $this->faker->unique()->word(),
            'detail' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween($min = 1000, $max = 20000),
            'category_id' => $this->faker->numberBetween($min =2, $max = 8),
            'photo' => 'images/asdefqwe.png',
        ];
    }
}
