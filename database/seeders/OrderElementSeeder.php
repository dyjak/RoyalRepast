<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Meal;
use App\Models\Order;
use App\Models\Order_element;

class OrderElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::all();
        foreach ($orders as $order) {
            $numMeals = rand(1, 15);

            // random meal
            $meals = Meal::inRandomOrder()->limit($numMeals)->get();

            foreach ($meals as $meal) {
                Order_element::create([
                    'order_id' => $order->id,
                    'meal_id' => $meal->id,
                    'quantity' => rand(1, 3)
                ]);
            }
        }
    }
}
