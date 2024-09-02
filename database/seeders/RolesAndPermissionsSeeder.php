<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Define all permissions
        $permissions = [
            'manage leads',
            'manage deals',
            'track customer interactions',
            'update contact information',
            'create campaigns',
            'manage campaigns',
            'segment customers',
            'analyze marketing performance',
            'handle customer issues',
            'manage support tickets',
            'provide live chat support',
            'manage user roles',
            'manage system configurations',
            'manage integrations',
            'view reports',
            'track KPIs',
            'analyze business performance',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles
        $roles = [
            'Sales Representative' => [
                'manage leads',
                'manage deals',
                'track customer interactions',
                'update contact information',
            ],
            'Marketing Manager' => [
                'create campaigns',
                'manage campaigns',
                'segment customers',
                'analyze marketing performance',
            ],
            'Customer Support Agent' => [
                'handle customer issues',
                'manage support tickets',
                'provide live chat support',
            ],
            'Administrator' => $permissions,
            'Executive' => [
                'view reports',
                'track KPIs',
                'analyze business performance',
            ],
            'Manager' => [
                'view reports',
                'track KPIs',
                'analyze business performance',
            ],
        ];

        // Create roles and assign permissions
        foreach ($roles as $roleName => $rolePermissions) {
            $role = Role::firstOrCreate(['name' => $roleName]);
            $role->syncPermissions($rolePermissions);
        }
    }
}
