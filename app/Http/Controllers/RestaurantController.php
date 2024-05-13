<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Meal_category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::inRandomOrder()->get();
        return view('main-panel.main', compact('restaurants'));
    }



    public function show($restaurant_id)
    {
        $restaurant = Restaurant::findOrFail($restaurant_id);

        $categories = Meal_category::all();
        $meals = Meal::where('restaurant_id', $restaurant_id)->get();

        return view('main-panel/restaurant-show', compact('restaurant', 'categories', 'meals'));
    }
}
