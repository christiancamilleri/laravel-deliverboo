<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            $order = new Order();

            $order->date_time = $faker->dateTime();
            $order->total_price = 0;
            $order->name = $faker->firstName() . ' ' . $faker->lastName();
            $order->email = $faker->email();
            $order->postal_code = $faker->postcode();
            $order->address = $faker->streetAddress();

            $order->save();
        }
    }
}
