<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Courier;
use App\Models\Order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $user = User::inRandomOrder()->first();
            if($user->id != 1)
            {
                $courier = Courier::inRandomOrder()->first();
                $methods = ['Cash', 'Card', 'Apple Pay', 'Google Pay', 'Crypto'];
                $orderData = [
                    'user_id' => $user->id,
                    'courier_id' => $courier->id,
                    'payment_method' => $methods[array_rand($methods)],
                    'address' => $user->city." ".$user->street." ".$user->address
                ];

                Order::create($orderData);
            }
        }
    }
}
