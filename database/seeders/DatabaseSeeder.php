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
        // Crear compañias de ejemplo
        $this->call(CompaniesSeeder::class);

        // Crear usuarios de ejemplo
        $this->call(UsersSeeder::class);
        
        // Crear tareas de ejemplo
        $this->call(TasksSeeder::class);
    }
}
