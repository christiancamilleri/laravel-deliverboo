<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 200; $i++) {
            $order = new Order();

            $order->total_price = 0;
            $order->name = $faker->firstName() . ' ' . $faker->lastName();
            $order->email = $faker->email();
            $order->postal_code = $faker->postcode();
            $order->address = $faker->streetAddress();
            $order->created_at = $faker->date() . ' ' . $faker->time();

            $order->save();

            // riempimento dell'ordine con un numero casuale di prodotti casuali

            // l'ordine viene generato in uno dei ristoranti casualmente
            $restaurants = Restaurant::all();

            $randomRestaurant = $faker->randomElement($restaurants);

            $restaurantMenu = $randomRestaurant->products;

            // L'ordine contiene un numero casuale di prodotti
            $randomNumberProducts = 0;
            if (count($restaurantMenu)) {
                $randomNumberProducts = $faker->numberBetween(1, 5);
            }

            for ($j = 0; $j < $randomNumberProducts; $j++) {
                $randomProduct = $faker->randomElement($restaurantMenu);

                // controllo se è già stato aggiunto un prodotto di tipo $randomProduct
                if ($order->products()->wherePivot('product_id', $randomProduct->id)->exists()) {
                    // in caso affermativo incremento solo la quantità
                    $order->products()->wherePivot('product_id', $randomProduct->id)->increment('quantity');
                } else {
                    // altrimenti aggiungo il record
                    $order->products()->attach($randomProduct);
                }

                $order->total_price += $randomProduct->price;
            }
            $order->save();
        }
    }
}
