<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminCouriersController;
use App\Http\Controllers\Admin\AdminMealCategoriesController;
use App\Http\Controllers\Admin\AdminMealsController;
use App\Http\Controllers\Admin\AdminOrderElementsController;
use App\Http\Controllers\Admin\AdminOrdersController;
use App\Http\Controllers\Admin\AdminRestaurantCategoriesController;
use App\Http\Controllers\Admin\AdminRestaurantsController;
use App\Http\Controllers\Admin\AdminUsersController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RestaurantCategoryController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\Ordering\CartController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
Route::get('/meals/{meal}', [MealController::class, 'show'])->name('meal.details');
Route::get('/restaurant/{restaurant_id}', [RestaurantController::class, 'show'])->name('restaurant.show');
Route::post('/restaurant/{restaurant_id}', [RestaurantController::class, 'filterByCategory'])->name('restaurant.filterByCategory');
Route::fallback([RestaurantController::class, 'index'])->name('restaurant.index');
Route::get('/restaurant_category/chart', [RestaurantCategoryController::class, 'chart'])->name('restaurant-category-chart');

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::patch('/profile/updateAddress', [ProfileController::class, 'updateAddress'])->name('profile.updateAddress');




    #CART ROUTES
    Route::patch('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/remove/{id}', [CartController::class, 'removeCart'])->name('cart.remove');
    Route::post('/cart/add/{meal}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/checkout', [CartController::class, 'placeOrder'])->name('cart.placeOrder');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{id}', [OrderController::class, 'show'])->name('order.details');


});







//ADMINISTRATOR ROUTES
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
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
    Route::get('/meal-edit-{id}', [AdminMealsController::class, 'edit'])->name('admin.meal.edit');
    Route::get('/meal-delete-{id}', [AdminMealsController::class, 'delete'])->name('admin.meal.delete');
    Route::get('/meal-create', [AdminMealsController::class, 'create'])->name('admin.meal.create');
    Route::put('/meal-update-{id}', [AdminMealsController::class, 'update'])->name('admin.meal.update');
    Route::delete('/meal-delete-{id}', [AdminMealsController::class, 'destroy'])->name('admin.meal.destroy');
    Route::post('/meal-store', [AdminMealsController::class, 'store'])->name('admin.meal.store');
    //restaurants
    Route::get('/admin-restaurants', [AdminRestaurantsController::class, 'index'])->name('admin.restaurants');
    Route::get('/restaurant-edit-{id}', [AdminRestaurantsController::class, 'edit'])->name('admin.restaurant.edit');
    Route::get('/restaurant-delete-{id}', [AdminRestaurantsController::class, 'delete'])->name('admin.restaurant.delete');
    Route::get('/restaurant-create', [AdminRestaurantsController::class, 'create'])->name('admin.restaurant.create');
    Route::put('/restaurant-update-{id}', [AdminRestaurantsController::class, 'update'])->name('admin.restaurant.update');
    Route::delete('/restaurant-delete-{id}', [AdminRestaurantsController::class, 'destroy'])->name('admin.restaurant.delete');
    Route::post('/restaurant-store', [AdminRestaurantsController::class, 'store'])->name('admin.restaurant.store');
    //couriers
    Route::get('/couriers', [AdminCouriersController::class, 'index'])->name('admin.couriers');
    Route::get('/courier-create', [AdminCouriersController::class, 'courierCreate'])->name('admin.courier.create');
    Route::post('/courier-store', [AdminCouriersController::class, 'store'])->name('admin.courier.store');
    Route::get('/courier-edit-{id}', [AdminCouriersController::class, 'courierEdit'])->name('admin.courier.edit');
    Route::put('/courier-update-{id}', [AdminCouriersController::class, 'update'])->name('admin.courier.update');
    Route::get('/courier-delete-{id}', [AdminCouriersController::class, 'courierDelete'])->name('admin.courier.delete');
    Route::delete('/courier-delete-{id}', [AdminCouriersController::class, 'destroy'])->name('admin.courier.delete');
    //orders
    Route::get('/admin/orders', [AdminOrdersController::class, 'index'])->name('admin.orders');
    Route::get('/admin/order/create', [AdminOrdersController::class, 'create'])->name('admin.order.create');
    Route::post('/admin/order/store', [AdminOrdersController::class, 'store'])->name('admin.order.store');
    Route::get('/admin/order/edit/{id}', [AdminOrdersController::class, 'edit'])->name('admin.order.edit');
    Route::put('/admin/order/update/{id}', [AdminOrdersController::class, 'update'])->name('admin.order.update');
    Route::get('/admin/order/delete/{id}', [AdminOrdersController::class, 'delete'])->name('admin.order.delete');
    Route::delete('/admin/order/delete/{id}', [AdminOrdersController::class, 'destroy'])->name('admin.order.delete');
    //orderelems
    Route::get('/order_elements', [AdminOrderElementsController::class, 'index'])->name('admin.order_elements');
    Route::get('/order_element/create', [AdminOrderElementsController::class, 'create'])->name('admin.order_element.create');
    Route::post('/order_element/store', [AdminOrderElementsController::class, 'store'])->name('admin.order_element.store');
    Route::get('/order_element/edit/{id}', [AdminOrderElementsController::class, 'edit'])->name('admin.order_element.edit');
    Route::put('/order_element/update/{id}', [AdminOrderElementsController::class, 'update'])->name('admin.order_element.update');
    Route::get('/order_element/delete/{id}', [AdminOrderElementsController::class, 'delete'])->name('admin.order_element.delete');
    Route::delete('/order_element/delete/{id}', [AdminOrderElementsController::class, 'destroy'])->name('admin.order_element.destroy');
    //mealcategories
    Route::get('/admin/meal_categories', [AdminMealCategoriesController::class, 'index'])->name('admin.meal_categories');
    Route::get('/admin/meal_category/create', [AdminMealCategoriesController::class, 'create'])->name('admin.meal_category.create');
    Route::post('/admin/meal_category/store', [AdminMealCategoriesController::class, 'store'])->name('admin.meal_category.store');
    Route::get('/admin/meal_category/edit/{id}', [AdminMealCategoriesController::class, 'edit'])->name('admin.meal_category.edit');
    Route::put('/admin/meal_category/update/{id}', [AdminMealCategoriesController::class, 'update'])->name('admin.meal_category.update');
    Route::get('/admin/meal_category/delete/{id}', [AdminMealCategoriesController::class, 'delete'])->name('admin.meal_category.delete');
    Route::delete('/admin/meal_category/delete/{id}', [AdminMealCategoriesController::class, 'destroy'])->name('admin.meal_category.destroy');
    //restaurantcategories
    Route::get('/admin/restaurant_categories', [AdminRestaurantCategoriesController::class, 'index'])->name('admin.restaurant_categories');
    Route::get('/admin/restaurant_category/create', [AdminRestaurantCategoriesController::class, 'create'])->name('admin.restaurant_category.create');
    Route::post('/admin/restaurant_category/store', [AdminRestaurantCategoriesController::class, 'store'])->name('admin.restaurant_category.store');
    Route::get('/admin/restaurant_category/edit/{id}', [AdminRestaurantCategoriesController::class, 'edit'])->name('admin.restaurant_category.edit');
    Route::put('/admin/restaurant_category/update/{id}', [AdminRestaurantCategoriesController::class, 'update'])->name('admin.restaurant_category.update');
    Route::get('/admin/restaurant_category/delete/{id}', [AdminRestaurantCategoriesController::class, 'delete'])->name('admin.restaurant_category.delete');
    Route::delete('/admin/restaurant_category/delete/{id}', [AdminRestaurantCategoriesController::class, 'destroy'])->name('admin.restaurant_category.destroy');
});

require __DIR__.'/auth.php';



