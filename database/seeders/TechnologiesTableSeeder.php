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
                'technology'  => 'php',
            ],
            [
                'technology'  => 'js',
            ],
            [
                'technology'  => 'html',
            ],
            [
                'technology'  => 'css',
            ],
            [
                'technology'  => 'laravel',
            ],
            [
                'technology'  => 'bootstrap',
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
