<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = ['Products', 'Orders', 'Users'];

        foreach ($modules as $module) {
            Permission::create(['name' => 'view ' . $module]);
            Permission::create(['name' => 'edit ' . $module]);
        }

        $admin = Role::create(['name' => 'admin']);
        $user  = Role::create(['name' => 'user']);

        $admin->givePermissionTo(Permission::all());
    }
}
