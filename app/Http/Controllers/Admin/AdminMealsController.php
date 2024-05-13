<?php
namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Meal_category;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminMealsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $mealsQuery = Meal::query();

        if ($search) {
            $mealsQuery->where('name', 'like', "%$search%");
        }

        $meals = $mealsQuery->get();

        return view('admin.meals.table-meals', compact('meals'));
    }

    public function mealUpdate($id)
    {
        $meal = Meal::find($id);
        $restaurants = Restaurant::all();
        $categories = Meal_category::all();
        return view('admin.meals.meal-edit', compact('meal', 'restaurants', 'categories'));
    }

    public function mealDestroy($id)
    {
        $meal = Meal::find($id);
        return view('admin.meals.meal-delete', compact('meal'));
    }

    public function mealCreate()
    {
        $restaurants = Restaurant::all();
        $categories = Meal_category::all();
        return view('admin.meals.meal-create', compact('restaurants', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:meal_categories,id',
            'price' => 'required|numeric|min:0',
            'image_path' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'description2' => 'nullable|string|max:255',
        ]);

        $meal = Meal::findOrFail($id);
        $meal->update($request->all());
        return redirect()->route('admin.meals')->with('success', 'Meal updated successfully');
    }

    public function destroy($id)
    {
        $meal = Meal::findOrFail($id);
        if ($meal->orderElements()->exists()) {
            return redirect()->route('admin.meals')->with('error', 'Couldn\'t remove this meal, because there are referral records.');
        }
        $meal->delete();
        return redirect()->route('admin.meals')->with('success', 'Meal has been successfully removed.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'restaurant_id' => 'required|exists:restaurants,id',
            'category_id' => 'required|exists:meal_categories,id',
            'price' => 'required|numeric|min:0',
            'image_path' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'description2' => 'nullable|string|max:255',
        ]);

        Meal::create($request->all());

        return redirect()->route('admin.meals')->with('success', 'Meal added successfully.');
    }
}
