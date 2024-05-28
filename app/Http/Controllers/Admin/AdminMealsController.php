<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Restaurant;
use App\Models\Meal_category;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;

class AdminMealsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $column = $request->input('column', 'name');

        $mealsQuery = Meal::query();
        if ($search && in_array($column, ['name', 'price', 'image_path', 'description', 'description2'])) {
            $mealsQuery->where($column, 'like', "%$search%");
        }
        $meals = $mealsQuery->get();

        return view('admin.meals.table-meals', compact('meals', 'column', 'search'));
    }

    public function create()
    {
        $restaurants = Restaurant::all();
        $categories = Meal_category::all();
        return view('admin.meals.meal-create', compact('restaurants', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:meal_categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'description2' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('meal_images');
        } else {
            $imagePath = null;
        }

        Meal::create([
            'name' => $request->name,
            'price' => $request->price,
            'restaurant_id' => $request->restaurant_id,
            'category_id' => $request->category_id,
            'image_path' => $request->image_path, // Zmiana
            'description' => $request->description,
            'description2' => $request->description2,
        ]);

        return redirect()->route('admin.meals')->with('success', 'Meal added successfully.');
    }

    public function edit($id)
    {
        $meal = Meal::findOrFail($id);
        $restaurants = Restaurant::all();
        $categories = Meal_category::all();
        return view('admin.meals.meal-edit', compact('meal', 'restaurants', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $meal = Meal::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:meal_categories,id',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'description2' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('meal_images');
            $meal->image_path = $imagePath;
        }

        $meal->name = $request->name;
        $meal->price = $request->price;
        $meal->restaurant_id = $request->restaurant_id;
        $meal->category_id = $request->category_id;
        $meal->description = $request->description;
        $meal->description2 = $request->description2;
        $meal->save();

        return redirect()->route('admin.meals')->with('success', 'Meal updated successfully.');
    }

    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);
        $meal->delete();
        return redirect()->route('admin.meals')->with('success', 'Meal deleted successfully.');
    }

    public function delete($id)
    {
        $meal = Meal::findOrFail($id);
        return view('admin.meals.meal-delete', compact('meal'));
    }
}
