<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminRestaurantsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $restaurantsQuery = Restaurant::query();

        if ($search) {
            $restaurantsQuery->where('name', 'like', "%$search%");
        }

        $restaurants = $restaurantsQuery->get();

        return view('admin.restaurants.table-restaurants', compact('restaurants'));
    }

    public function restaurantUpdate($id)
    {
        $restaurant = Restaurant::find($id);
        return view('admin.restaurants.restaurant-edit', compact('restaurant'));
    }

    public function restaurantDestroy($id)
    {
        $restaurant = Restaurant::find($id);
        return view('admin.restaurants.restaurant-delete', compact('restaurant'));
    }

    public function restaurantCreate()
    {
        return view('admin.restaurants.restaurant-create');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($request->all());
        return redirect()->route('admin.restaurants')->with('success', 'Restaurant updated successfully');
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        if ($restaurant->meals()->exists()) {
            return redirect()->route('admin.restaurants')->with('error', 'Couldn\'t remove this restaurant, because there are referral records.');
        }
        $restaurant->delete();
        return redirect()->route('admin.restaurants')->with('success', 'Restaurant has been successfully removed.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        Restaurant::create($request->all());

        return redirect()->route('admin.restaurants')->with('success', 'Restaurant added successfully.');
    }
}
