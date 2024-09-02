<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        $this->call(RolesAndPermissionsSeeder::class)->run();
        $this->call(AdminSeeder::class)->run(); // After installer is created we will remove the admin seeder
    }
}
