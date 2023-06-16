<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use FakerRestaurant\Provider\it_IT\Restaurant as FakerRestaurant;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $restaurants = Restaurant::all();
        foreach ($restaurants as $restaurant) {
            $randomProductsNumber = $faker->numberBetween(5, 10);

            for ($i = 0; $i < $randomProductsNumber; $i++) {
                $product = new Product();

                $product->restaurant_id = $restaurant->id;

                $faker->addProvider(new FakerRestaurant($faker));
                $product->name = $faker->foodName();

                $product->slug = Str::slug($product->name);
                // $duplicate = count(Product::where('restaurant_id', $product->restaurant_id)->where('slug', $product->slug)->get());
                // if ($duplicate) {
                //     $product->slug .= '-' . $duplicate;
                // }

                $product->description = $faker->paragraph();
                $product->price = $faker->randomFloat(2, 0, 30);

                $product->save();
            }
        }
    }
}
