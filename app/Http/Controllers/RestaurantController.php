<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Meal_category;
use App\Models\Restaurant;
use App\Models\Restaurant_category;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $categories = Restaurant_category::all();
        $sort_by = $request->input('sort_by');
        $selected_category = $request->input('category', 'all');
        $free_delivery = $request->input('free_delivery');
        $search = $request->input('search');

        $restaurants = Restaurant::query();

        if ($sort_by) {
            $restaurants->orderBy($sort_by);
        }

        if ($selected_category && $selected_category !== 'all') {
            $restaurants->whereHas('category', function($q) use ($selected_category) {
                $q->where('name', $selected_category);
            });
        }

        if ($free_delivery) {
            $restaurants->where('delivery_price', 0.0);
        }

        if ($search) {
            $restaurants->where('name', 'like', '%' . $search . '%');
        }

        $restaurants = $restaurants->paginate(5);

        return view('main-panel.restaurants', compact('categories', 'restaurants', 'sort_by', 'selected_category', 'free_delivery', 'search'));
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
