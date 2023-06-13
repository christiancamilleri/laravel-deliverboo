<?php

namespace Database\Seeders;

use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TypologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $typologyNames = ['Cinese', 'Tailandese', 'Messicano', 'Fast-food', 'Giapponese', 'Pizzeria'];

        foreach ($typologyNames as $typologyName) {
            $typology = new Typology();

            $typology->name = $typologyName;
            $typology->slug = Str::slug($typology->name);
            $typology->color = $faker->hexColor();

            $typology->save();
        }
    }
}
