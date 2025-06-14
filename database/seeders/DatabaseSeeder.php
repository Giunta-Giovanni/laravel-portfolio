<?php

namespace Database\Seeders;

// use App\Models\User;
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

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        // codice che esegua il nostro seeder
        $this->call([
            TypesSeeder::class,
            ProjectsSeeder::class,
            TechnologiesSeeder::class,
            UserSeeder::class
        ]);
    }
}
