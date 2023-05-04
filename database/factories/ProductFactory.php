<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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
            'name'=>fake()->name(),
            'slug'=>fake()->slug(),
            'description'=>fake()->text(2000),
            'price'=>fake()->numberBetween(10,10000),
            'image'=>fake()->image(),
            'category_id'=>Category::inRandomOrder()->first()->id,
        ];
    }
}