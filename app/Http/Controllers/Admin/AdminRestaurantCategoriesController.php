<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurant_category;
use Illuminate\Http\Request;

class AdminRestaurantCategoriesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $column = $request->input('column', 'name');

        $restaurantCategoriesQuery = Restaurant_category::query();
        if ($search) {
            $restaurantCategoriesQuery->where($column, 'like', "%$search%");
        }
        $restaurantCategories = $restaurantCategoriesQuery->get();

        return view('admin.categories.table-restaurant-categories', compact('restaurantCategories'));
    }

    public function create()
    {
        return view('admin.categories.restaurant-category-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Restaurant_category::create($request->all());

        return redirect()->route('admin.restaurant_categories')->with('success', 'Restaurant category added successfully.');
    }

    public function edit($id)
    {
        $restaurantCategory = Restaurant_category::find($id);
        return view('admin.categories.restaurant-category-edit', compact('restaurantCategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $restaurantCategory = Restaurant_category::findOrFail($id);
        $restaurantCategory->update($request->all());

        return redirect()->route('admin.restaurant_categories')->with('success', 'Restaurant category updated successfully.');
    }

    public function delete($id)
    {
        $restaurantCategory = Restaurant_category::findOrFail($id);
        return view('admin.categories.restaurant-category-delete', compact('restaurantCategory'));
    }

    public function destroy($id)
    {
        $category = Restaurant_category::findOrFail($id);

        if ($category->restaurants()->exists()) {
            return redirect()->route('admin.restaurant_categories')->with('error', 'Cannot delete category because restaurants are associated with it.');
        }

        $category->delete();

        return redirect()->route('admin.restaurant_categories')->with('success', 'Restaurant category deleted successfully.');
    }
}
