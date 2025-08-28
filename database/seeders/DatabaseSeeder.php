<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User seeding example
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Custom seeders ko yahan call karo
        $this->call([
            RolePermissionSeeder::class,
            AssignRolePermissionSeeder::class,
            CategoryProductSeeder::class,
        ]);
    }
}
