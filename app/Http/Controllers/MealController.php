<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function show(Meal $meal)
    {
        return view('main-panel.meals-show', ['meal' => $meal]);
    }
}
