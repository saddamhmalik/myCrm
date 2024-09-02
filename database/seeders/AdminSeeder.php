<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // After installer is created we will remove the admin seeder

        $allPermissions = Permission::all();

        // Create the Administrator role
        $adminRole = Role::firstOrCreate(['name' => 'Administrator']);

        // Assign all permissions to the Administrator role
        $adminRole->syncPermissions($allPermissions);

        // Create a default administrator user
        $adminUser = User::firstOrCreate([
            'email' => 'admin@admin.com',
        ], [
            'name' => 'Admin User',
            'password' => bcrypt('Password@1'),
        ]);

        // Assign the Administrator role to the admin user
        $adminUser->assignRole($adminRole);
    }
}
