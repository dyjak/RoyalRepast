<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Meal_category;


class MealCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meal_category::create(['name' => 'Breakfast']);
        Meal_category::create(['name' => 'Lunch']);
        Meal_category::create(['name' => 'Dinner']);
        Meal_category::create(['name' => 'Appetizers']);
        Meal_category::create(['name' => 'Desserts']);
        Meal_category::create(['name' => 'Beverages']);
    }
}
