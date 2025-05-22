<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// importiamo il faker generator
use Faker\Generator as Faker;


class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        //crea un tot numero di istanze
        for ($i = 0; $i < 10; $i++) {
            $newProject = new Project();

            $newProject->title = $faker->name;
            $newProject->client = $faker->company();
            $newProject->start_date = $faker->date();
            $newProject->end_date = $faker->date();
            $newProject->state = 'completed';
            $newProject->description = $faker->realText($maxNbChars = 200, $indexSize = 2);


            $newProject->save();
        }
    }
}
