<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // User seeding example
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => '$2y$12$sE7RiUjbFdw8FoQaYaG1F.YU.eFRCfxF9PZ5JdGjsZnv1T6oamFGa' // click@123
        // ]);

        // Custom seeders ko yahan call karo
        $this->call([
            RolePermissionSeeder::class,
            AssignRolePermissionSeeder::class,
            CategoryProductSeeder::class,
        ]);
        // \App\Models\User::factory(50)->create();
        // \App\Models\Category::factory(5)->create();
        // \App\Models\Product::factory(50)->create();
    }
}
