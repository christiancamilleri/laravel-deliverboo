<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Typology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Config;
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
        $restaurants = Config::get('custom.restaurants');

        $i = 1;
        foreach ($restaurants as $restaurant) {
            $newRestaurant = new Restaurant();

            $newRestaurant->user_id = $i;
            $newRestaurant->name = $restaurant['name'];
            $newRestaurant->cover = 'examples/' . $restaurant['cover'] . '.jpg';
            $newRestaurant->logo = 'examples/' . $restaurant['logo'] . '.jpg';

            $newRestaurant->slug = Str::slug($newRestaurant->name);
            $duplicate = count(Restaurant::where('slug', $newRestaurant->slug)->get());
            if ($duplicate) {
                $newRestaurant->slug .= '-' . $duplicate;
            }

            $newRestaurant->address = $faker->streetAddress();
            $newRestaurant->postal_code = $faker->postcode();
            $newRestaurant->vat_number = $faker->vat();

            $newRestaurant->save();

            $typologies = Typology::all();
            $randomTipologiesNumber = $faker->numberBetween(1, count($typologies) / 2);
            $randomTypologies = $faker->randomElements($typologies, $randomTipologiesNumber, false);

            foreach ($randomTypologies as $randomTypology) {
                $newRestaurant->typologies()->attach($randomTypology);
            }

            $i++;
        }
    }
}
