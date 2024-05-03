<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Courier;

class CourierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Courier::create([
            'name' => 'David',
            'surname' => 'Miller',
            'restaurant_id' => 2,
            'vehicle' => 'Car',
        ]);

        Courier::create([
            'name' => 'Sophia',
            'surname' => 'Johnson',
            'restaurant_id' => 2,
            'vehicle' => 'Bicycle',
        ]);

        Courier::create([
            'name' => 'Ethan',
            'surname' => 'Brown',
            'restaurant_id' => 3,
            'vehicle' => 'Motorcycle',
        ]);

        Courier::create([
            'name' => 'Olivia',
            'surname' => 'Davis',
            'restaurant_id' => 3,
            'vehicle' => 'Car',
        ]);

        Courier::create([
            'name' => 'Liam',
            'surname' => 'Miller',
            'restaurant_id' => 4,
            'vehicle' => 'Bicycle',
        ]);

        Courier::create([
            'name' => 'Emma',
            'surname' => 'Wilson',
            'restaurant_id' => 4,
            'vehicle' => 'Truck',
        ]);

        Courier::create([
            'name' => 'Noah',
            'surname' => 'Taylor',
            'restaurant_id' => 5,
            'vehicle' => 'Scooter',
        ]);

        Courier::create([
            'name' => 'Ava',
            'surname' => 'Moore',
            'restaurant_id' => 6,
            'vehicle' => 'Motorcycle',
        ]);

        Courier::create([
            'name' => 'William',
            'surname' => 'Anderson',
            'restaurant_id' => 7,
            'vehicle' => 'Car',
        ]);

        Courier::create([
            'name' => 'Sophia',
            'surname' => 'Clark',
            'restaurant_id' => 8,
            'vehicle' => 'Bicycle',
        ]);

        Courier::create([
            'name' => 'James',
            'surname' => 'Allen',
            'restaurant_id' => 9,
            'vehicle' => 'Truck',
        ]);

        Courier::create([
            'name' => 'Isabella',
            'surname' => 'Hall',
            'restaurant_id' => 10,
            'vehicle' => 'Scooter',
        ]);
    }
}
