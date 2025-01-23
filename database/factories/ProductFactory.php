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
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));
        return [
            'nombre'=>fake()->sentence(2),
            'descripcion'=>fake()->text(),
            'imagen'=>"images/products".fake()->picsum('public/storage/images/products', 640, 480, false),
            'stock'=>fake()->randomNumber(),
            'category_id'=>Category::all()->random()->id
        ];
    }
}
