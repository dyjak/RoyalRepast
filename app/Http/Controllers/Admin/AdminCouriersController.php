<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class AdminCouriersController extends Controller
{
    public function index()
    {
        $couriers = Courier::all();
        return view('admin.couriers.table-couriers', compact('couriers'));
    }

    public function courierCreate()
    {
        $restaurants = Restaurant::all();
        return view('admin.couriers.courier-create', compact('restaurants'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'restaurant_id' => 'required|exists:restaurants,id',
            'vehicle' => 'required|string|max:255',
        ]);

        Courier::create($request->all());
        return redirect()->route('admin.couriers')->with('success', 'Courier added successfully.');
    }

    public function courierEdit($id)
    {
        $courier = Courier::findOrFail($id);
        $restaurants = Restaurant::all();
        return view('admin.couriers.courier-edit', compact('courier', 'restaurants'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'restaurant_id' => 'required|exists:restaurants,id',
            'vehicle' => 'required|string|max:255',
        ]);

        $courier = Courier::findOrFail($id);
        $courier->update($request->all());
        return redirect()->route('admin.couriers')->with('success', 'Courier updated successfully.');
    }

    public function courierDelete($id)
    {
        $courier = Courier::findOrFail($id);
        return view('admin.couriers.courier-delete', compact('courier'));
    }

    public function destroy($id)
    {
        $courier = Courier::findOrFail($id);
        $courier->delete();
        return redirect()->route('admin.couriers')->with('success', 'Courier has been successfully removed.');
    }
}
