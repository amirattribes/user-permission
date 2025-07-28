<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AssignRolePermissionSeeder extends Seeder
{
    public function run()
    {
        $admin = User::find(1);
        if ($admin) {
            $admin->assignRole('admin');
        }

        $user = User::find(2);
        if ($user) {
            $user->assignRole('user');
            $user->givePermissionTo(['view Products', 'edit Orders']);
        }
    }
}
