<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            'HTML',
            'CSS',
            'JavaScript',
            'TypeScript',
            'Vue.js',
            'React',
            'Tailwind CSS',
            'Bootstrap',
            'PHP',
            'Laravel',
            'Node.js',
            'Express.js',
            'Python',
            'Django',
            'Ruby on Rails',
            'MySQL',
            'PostgreSQL',
            'SQLite',
            'MongoDB',
            'Redis',
            'Docker',
            'Kubernetes',
            'GitHub Actions',
            'CI/CD',
            'Nginx',
            'Apache',
            'Composer',
            'NPM',
            'Yarn',
            'Webpack',
            'Vite',
            'Git',
            'VS Code',
        ];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();

            $newTechnology->name = $technology;

            $newTechnology->save();
        }
    }
}
