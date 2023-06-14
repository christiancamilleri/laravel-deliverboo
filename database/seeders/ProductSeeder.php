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
        for ($i = 0; $i < 30; $i++) {
            $product = new Product();

            $restaurants = Restaurant::all();
            $randomRestaurant = $faker->randomElement($restaurants);
            $product->restaurant_id = $randomRestaurant->id;

            $faker->addProvider(new FakerRestaurant($faker));
            $product->name = $faker->foodName();
            $product->slug = Str::slug($product->name, '-');
            $product->description = $faker->paragraph();
            $product->price = $faker->randomFloat(2, 0, 999);

            $product->save();
        }
    }
}
