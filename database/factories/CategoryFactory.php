<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => $this->faker->unique()->randomNumber(5), // agar category_id auto-increment nahi hai
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'sort_order' => $this->faker->numberBetween(1, 100),
            
        ];
    }
}
