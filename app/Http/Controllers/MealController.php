<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{

    public function show(Meal $meal)
    {
        $mealsFromSameRestaurant = $meal->restaurant->meals()->where('id', '!=', $meal->id)->inRandomOrder()->take(4)->get();
        $mealsFromSameCategory = $meal->category->meals()->where('id', '!=', $meal->id)->inRandomOrder()->take(4)->get();
        return view('main-panel.meals-show', compact('meal', 'mealsFromSameRestaurant', 'mealsFromSameCategory'));
    }
}
