<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

            $product->restaurant_id = $faker->numberBetween(1, 10);
            $product->name = $faker->company();
            $product->slug = Str::slug($product->name, '-');
            $product->description = $faker->paragraph();
            $product->price = $faker->randomFloat(2, 0, 999);

            $product->save();
        }
    }
}
