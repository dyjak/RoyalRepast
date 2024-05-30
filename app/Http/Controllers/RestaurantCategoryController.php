<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Restaurant_category;
use Illuminate\Http\Request;

class RestaurantCategoryController extends Controller
{
    public function chart()
    {
        $categories = Restaurant_category::withCount('restaurants')->get();
        return view('additions.chart', compact('categories'));
    }
}
