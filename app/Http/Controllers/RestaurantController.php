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



        $meals = Meal::where('restaurant_id', $restaurant_id)->get();

        $categories = Meal_category::all();
        $nonEmptyCategories = $categories->filter(function($category) use ($meals) {
            return $meals->where('category_id', $category->id)->isNotEmpty();
        });

        return view('main-panel/restaurant-show', compact('restaurant', 'nonEmptyCategories', 'meals'));
    }
}
