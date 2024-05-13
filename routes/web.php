<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminMealsController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantController;
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


    //ADMINISTRATOR ROUTES
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
        //users
    Route::get('/admin-users', [AdminUsersController::class, 'index'])->name('admin.users');
    Route::get('/user-edit-{id}', [AdminUsersController::class, 'userUpdate'])->name('admin.user.edit');
    Route::get('/user-delete-{id}', [AdminUsersController::class, 'userDestroy'])->name('admin.user.delete');
    Route::get('/user-create', [AdminUsersController::class, 'userCreate'])->name('admin.user.create');
    Route::put('/user-update-{id}', [AdminUsersController::class, 'update'])->name('admin.user.update');
    Route::delete('/user-delete-{id}', [AdminUsersController::class, 'destroy'])->name('admin.user.delete');
    Route::post('/user-store', [AdminUsersController::class, 'store'])->name('admin.user.store');
        //meals
    Route::get('/admin-meals', [AdminMealsController::class, 'index'])->name('admin.meals');
    Route::get('/meal-edit-{id}', [AdminMealsController::class, 'mealUpdate'])->name('admin.meal.edit');
    Route::get('/meal-delete-{id}', [AdminMealsController::class, 'mealDestroy'])->name('admin.meal.delete');
    Route::get('/meal-create', [AdminMealsController::class, 'mealCreate'])->name('admin.meal.create');
    Route::put('/meal-update-{id}', [AdminMealsController::class, 'update'])->name('admin.meal.update');
    Route::delete('/meal-delete-{id}', [AdminMealsController::class, 'destroy'])->name('admin.meal.delete');
    Route::post('/meal-store', [AdminMealsController::class, 'store'])->name('admin.meal.store');







    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');

    Route::get('/meals/{meal}', [MealController::class, 'show'])->name('meal.details');


    Route::get('/restaurant/{restaurant_id}', [RestaurantController::class, 'show'])->name('restaurant.show');

});

require __DIR__.'/auth.php';



