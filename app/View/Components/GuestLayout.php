<?php

namespace App\View\Components;

use App\Models\Meal;
use Illuminate\View\Component;
use Illuminate\View\View;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $mealImage = Meal::inRandomOrder()->first()->image_path;
        return view('layouts.guest', compact('mealImage'));
    }

}
