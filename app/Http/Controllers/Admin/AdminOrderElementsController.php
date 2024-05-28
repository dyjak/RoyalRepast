<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Order_element;
use Illuminate\Http\Request;

class AdminOrderElementsController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $column = $request->input('column', 'id');

        $orderElementsQuery = Order_element::query();
        if ($search) {
            $orderElementsQuery->where($column, 'like', "%$search%");
        }
        $orderElements = $orderElementsQuery->get();

        return view('admin.orders.table-elements', compact('orderElements'));
    }

    public function create()
    {
        $orders = Order::all();
        $meals = Meal::all();
        return view('admin.orders.element-create', compact('orders', 'meals'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'meal_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        Order_element::create($request->all());

        return redirect()->route('admin.order_elements')->with('success', 'Order element added successfully.');
    }

    public function edit($id)
    {
        $orderElement = Order_element::find($id);
        $orders = Order::all();
        $meals = Meal::all();
        return view('admin.orders.element-edit', compact('orderElement', 'orders', 'meals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'order_id' => 'required|integer',
            'meal_id' => 'required|integer',
            'quantity' => 'required|integer|min:1',
        ]);

        $orderElement = Order_element::findOrFail($id);
        $orderElement->update($request->all());

        return redirect()->route('admin.order_elements')->with('success', 'Order element updated successfully.');
    }

    public function delete($id)
    {
        $orderElement = Order_element::findOrFail($id);
        return view('admin.orders.element-delete', compact('orderElement'));
    }

    public function destroy($id)
    {
        $orderElement = Order_element::findOrFail($id);
        $orderElement->delete();
        return redirect()->route('admin.order_elements')->with('success', 'Order element deleted successfully.');
    }
}
