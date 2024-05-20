<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meal;

class HomeController extends Controller
{
    public function index()
    {
        $mealImage = Meal::inRandomOrder()->first()->image_path;
        return view('home', compact('mealImage'));
    }
}
