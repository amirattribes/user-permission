<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    
    public function definition(): array
    {
        $seed = $this->faker->unique()->numberBetween(1, 9999);
        return [
            'category_id' => Category::factory(), // har product ka ek category hoga
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->randomFloat(2, 50, 5000),
            'image' => "https://picsum.photos/seed/product-$seed/640/480", 
            'is_active' => $this->faker->boolean(),
            'stock' => $this->faker->numberBetween(0, 200),
        ];
    }
}
