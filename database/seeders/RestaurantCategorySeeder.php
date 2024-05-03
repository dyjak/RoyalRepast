<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurant_category;
class RestaurantCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant_category::create(['name' => 'Fast Food']);
        Restaurant_category::create(['name' => 'Fine Dining']);
        Restaurant_category::create(['name' => 'Casual Dining']);
        Restaurant_category::create(['name' => 'Cafe']);
        Restaurant_category::create(['name' => 'Kebab']);
        Restaurant_category::create(['name' => 'Pizza']);
        Restaurant_category::create(['name' => 'Food Truck']);
    }
}
