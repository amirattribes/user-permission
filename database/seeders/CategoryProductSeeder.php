<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryProductSeeder extends Seeder
{
    public function run(): void
    {
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

        // Insert products
        $products = [
            // Perfume
            ['category_id' => 1, 'name' => 'Dior Sauvage', 'description' => 'Luxury perfume', 'price' => 12000, 'stock' => 10],
            // Stationery
            ['category_id' => 2, 'name' => 'Pilot Pen Set', 'description' => 'Smooth writing gel pens', 'price' => 500, 'stock' => 100],
            // Sports
            ['category_id' => 3, 'name' => 'Cricket Bat', 'description' => 'Professional bat', 'price' => 7000, 'stock' => 8],
            // Makeup
            ['category_id' => 4, 'name' => 'MAC Lipstick', 'description' => 'Red Matte', 'price' => 2500, 'stock' => 30],
            // Toys
            ['category_id' => 5, 'name' => 'Lego Set', 'description' => 'Creative toys for kids', 'price' => 5000, 'stock' => 15],
            // Children Clothe
            ['category_id' => 6, 'name' => 'Kids T-Shirt', 'description' => 'Cotton summer shirt', 'price' => 800, 'stock' => 50],
            // Ladies Suit
            ['category_id' => 7, 'name' => 'Ladies Embroidered Suit', 'description' => '3 piece suit', 'price' => 4500, 'stock' => 20],
        ];


        DB::table('products')->insert($products);
    }
}

