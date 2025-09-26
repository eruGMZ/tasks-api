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
        // Create the default company
        $this->call(CompaniesSeeder::class); 

        // Create example users
        $this->call(UsersSeeder::class);
        
        // Create example tasks
        $this->call(TasksSeeder::class);
    }
}
