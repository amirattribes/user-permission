<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('en_US'); // English faker

        // Insert categories
        $categories = [
            ['name' => 'Perfume'],
            ['name' => 'Stationery'],
            ['name' => 'Sports'],
            ['name' => 'Makeup'],
            ['name' => 'Toys'],
            ['name' => 'Children Clothes'],
            ['name' => 'Ladies Suit'],
        ];

        DB::table('categories')->insert($categories);
         // ✅ Generate random image URLs in a loop
        $image = [];
        for ($i = 1; $i < 9; $i++) {
            $seed = $faker->unique()->numberBetween(1, 9999);
            $image[$i] = "https://picsum.photos/seed/product-$seed/640/480";
        }
        // Insert products
        $products = [
            // Perfume
            ['category_id' => 1, 'name' => 'Dior Sauvage', 'description' => 'Luxury perfume', 'price' => 12000, 'stock' => 10, 'image'=> $image[1]],
            // Stationery
            ['category_id' => 2, 'name' => 'Pilot Pen Set', 'description' => 'Smooth writing gel pens', 'price' => 500, 'stock' => 100, 'image'=> $image[2]],
            // Sports
            ['category_id' => 3, 'name' => 'Cricket Bat', 'description' => 'Professional bat', 'price' => 7000, 'stock' => 8, 'image'=> $image[3]],
            // Makeup
            ['category_id' => 4, 'name' => 'MAC Lipstick', 'description' => 'Red Matte', 'price' => 2500, 'stock' => 30, 'image'=> $image[4]],
            // Toys
            ['category_id' => 5, 'name' => 'Lego Set', 'description' => 'Creative toys for kids', 'price' => 5000, 'stock' => 15, 'image'=> $image[5]],
            // Children Clothe
            ['category_id' => 6, 'name' => 'Kids T-Shirt', 'description' => 'Cotton summer shirt', 'price' => 800, 'stock' => 50, 'image'=> $image[6]],
            // Ladies Suit
            ['category_id' => 7, 'name' => 'Ladies Embroidered Suit', 'description' => '3 piece suit', 'price' => 4500, 'stock' => 20, 'image'=> $image[7]],
            // Ladies Suit
            ['category_id' => 7, 'name' => 'Ladies Simple Suit', 'description' => '3 piece suit', 'price' => 3500, 'stock' => 20, 'image'=> $image[8]],
        ];


        DB::table('products')->insert($products);
    }
}

