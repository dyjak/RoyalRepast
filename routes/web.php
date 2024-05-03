<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\MealController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/admin-users', [UserController::class, 'index'])->name('users.index');

    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');

    Route::get('/meals/{meal}', [MealController::class, 'show'])->name('meal.details');

});

require __DIR__.'/auth.php';



