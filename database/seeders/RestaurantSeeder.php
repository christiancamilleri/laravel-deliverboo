<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $restaurant = new Restaurant();

            $restaurant->user_id = $i + 1;
            $restaurant->name = $faker->company();
            $restaurant->slug = Str::slug($restaurant->name, '-');
            $restaurant->address = $faker->streetAddress();
            $restaurant->postal_code = $faker->postcode();
            $restaurant->vat_number = $faker->vat();

            $restaurant->save();
        }
    }
}
