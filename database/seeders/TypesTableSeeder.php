<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 100; $i++) {
            $type = new Type();

            $type->type = $faker->word();
            $type->collabs = $faker->name();
            $type->save();
        }
    }
}
