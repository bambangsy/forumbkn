<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userRole = Role::create(['name' => 'user']);
        $expertRole = Role::create(['name' => 'expert']);

        $user = User::create([
            'name' => 'New User',
            'email' => 'user@example.com',
            'password' => bcrypt('password'),
        ]);
        // Assigning a role to the user
        $user->assignRole($userRole);

        // Creating an admin user
        $expert = User::create([
            'name' => 'Expert User',
            'email' => 'expert1@example.com',
            'password' => bcrypt('password'),
        ]);
        // Assigning the expert role to the user
        $expert->assignRole($expertRole);

        $expert = User::create([
            'name' => 'Expert User 2',
            'email' => 'expert2@example.com',
            'password' => bcrypt('password'),
        ]);
        // Assigning the expert role to the user
        $expert->assignRole($expertRole);

        // Call the category seeder
        $this->call(CategorySeeder::class);
    }
};