<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technologies = [
            [
                'technology'  => 'Php',
            ],
            [
                'technology'  => 'Js',
            ],
            [
                'technology'  => 'HTML',
            ],
            [
                'technology'  => 'CSS',
            ],
            [
                'technology'  => 'Laravel',
            ],
            [
                'technology'  => 'Bootstrap',
            ],
            [
                'technology'  => 'Vue.js',
            ],
        ];

        foreach ($technologies as $technology) {
            Technology::create($technology);
        }
    }
}
