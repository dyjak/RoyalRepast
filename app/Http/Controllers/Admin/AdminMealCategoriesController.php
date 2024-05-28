<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meal_category;
use Illuminate\Http\Request;

class AdminMealCategoriesController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $column = $request->input('column', 'name');

        $mealCategoriesQuery = Meal_category::query();
        if ($search) {
            $mealCategoriesQuery->where($column, 'like', "%$search%");
        }
        $mealCategories = $mealCategoriesQuery->get();

        return view('admin.categories.table-meal-categories', compact('mealCategories'));
    }

    public function create()
    {
        return view('admin.categories.meal-category-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Meal_category::create($request->all());

        return redirect()->route('admin.meal_categories')->with('success', 'Meal category added successfully.');
    }

    public function edit($id)
    {
        $mealCategory = Meal_category::find($id);
        return view('admin.categories.meal-category-edit', compact('mealCategory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $mealCategory = Meal_category::findOrFail($id);
        $mealCategory->update($request->all());

        return redirect()->route('admin.meal_categories')->with('success', 'Meal category updated successfully.');
    }

    public function delete($id)
    {
        $mealCategory = Meal_category::findOrFail($id);
        return view('admin.categories.meal-category-delete', compact('mealCategory'));
    }

    public function destroy($id)
    {
        $category = Meal_category::findOrFail($id);

        if ($category->meals()->exists()) {
            return redirect()->route('admin.meal_categories')->with('error', 'Cannot delete category because meals are associated with it.');
        }

        $category->delete();

        return redirect()->route('admin.meal_categories')->with('success', 'Meal category deleted successfully.');
    }
}
