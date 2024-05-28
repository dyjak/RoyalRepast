<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use App\Models\Restaurant_category;
use Illuminate\Http\Request;

class AdminRestaurantsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $column = $request->input('column', 'name');

        $restaurantsQuery = Restaurant::query();
        if ($search) {
            $restaurantsQuery->where($column, 'like', "%$search%");
        }
        $restaurants = $restaurantsQuery->get();

        return view('admin.restaurants.table-restaurants', compact('restaurants'));
    }

    public function restaurantUpdate($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.restaurants.restaurant-edit', compact('restaurant'));
    }

    public function restaurantDestroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.restaurants.restaurant-delete', compact('restaurant'));
    }

    public function restaurantCreate()
    {
        return view('admin.restaurants.restaurant-create');
    }
    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $categories = Restaurant_category::all();
        return view('admin.restaurants.restaurant-edit', compact('restaurant', 'categories'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'restaurant_category_id' => 'required|exists:restaurant_categories,id',
            'city' => 'required|string|max:255',
            'postal_code' => ['required', 'string', 'max:255', 'regex:/^\d{2}-\d{3}$/'],
            'street' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => ['nullable', 'string', 'max:255', 'regex:/^\+\d{2} \d{9}$/'],
            'delivery_price' => 'required|numeric|min:0',
        ]);

        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($request->all());
        return redirect()->route('admin.restaurants')->with('success', 'Restaurant updated successfully');
    }
    public function delete($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        return view('admin.restaurants.restaurant-delete', compact('restaurant'));
    }
    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);

        if ($restaurant->meals()->exists()) {
            return redirect()->route('admin.restaurants')->with('error', 'Couldn\'t remove this restaurant, because there are related meals.');
        }

        $restaurant->delete();
        return redirect()->route('admin.restaurants')->with('success', 'Restaurant has been successfully removed.');
    }
    public function create()
    {
        $categories = Restaurant_category::all();
        return view('admin.restaurants.restaurant-create', compact('categories'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'restaurant_category_id' => 'required|exists:restaurant_categories,id',
            'city' => 'required|string|max:255',
            'postal_code' => ['required', 'string', 'max:255', 'regex:/^\d{2}-\d{3}$/'],
            'street' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => ['nullable', 'string', 'max:255', 'regex:/^\+\d{2} \d{9}$/'],
            'delivery_price' => 'required|numeric|min:0',
        ]);

        Restaurant::create($request->all());

        return redirect()->route('admin.restaurants')->with('success', 'Restaurant added successfully.');
    }
}
