<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Project;
use App\Models\Technology;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologies = Technology::all()->pluck('id')->toArray();

        for ($i = 0; $i < 100; $i++) {
            $project = new Project();

            $project->type_id = rand(1, 100);
            $project->title = $faker->word();
            $project->date = $faker->dateTime();
            $project->description = $faker->paragraph();
            $project->name = $faker->word();
            $project->surname = $faker->word();

            $project->save();

            $project->technologies()->sync($faker->randomElements($technologies, rand(1, count($technologies))));
        }
    }
}
