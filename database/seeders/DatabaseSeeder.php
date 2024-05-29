<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'bambang',
            'email' => 'bambang@example.com',
            'password' => bcrypt('bambang') 
        ]);
        User::factory()->create([
            'name' => 'raka',
            'email' => 'raka@example.com',
            'password' => bcrypt('raka') 
        ]);

        Category::create(['name' => 'politik']);
        Category::create(['name' => 'agama']);
        Category::create(['name' => 'ketahanan']);
    }
}
