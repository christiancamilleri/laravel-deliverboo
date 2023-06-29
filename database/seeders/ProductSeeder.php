<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Config;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $restaurantsConfig = Config::get('custom.restaurants');

        $restaurants = Restaurant::all();

        $i = 0;
        foreach ($restaurants as $restaurant) {
            $products = $restaurantsConfig[$i]['products'];

            foreach ($products as $product) {
                $newProduct = new Product();

                $newProduct->restaurant_id = $restaurant->id;
                $newProduct->name = $product['name'];
                $newProduct->photo = 'examples/product-' . $faker->numberBetween(1, 20) . '.jpg';

                $newProduct->slug = Str::slug($newProduct->name);

                $newProduct->description = $product['description'];
                $newProduct->price = $faker->randomFloat(2, 0, 10);

                $newProduct->save();
            }

            $i++;
        }
    }
}
