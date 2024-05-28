<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courier;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminOrdersController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $column = $request->input('column', 'id');

        $ordersQuery = Order::query();
        if ($search) {
            $ordersQuery->where($column, 'like', "%$search%");
        }
        $orders = $ordersQuery->get();

        return view('admin.orders.table-orders', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        $couriers = Courier::all();
        return view('admin.orders.order-create', compact('users', 'couriers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'courier_id' => 'required|integer',
            'payment_method' => 'required|string|max:255',
            'total_cost' => 'required|numeric',
            'address' => 'required|string|max:255',
        ]);

        Order::create($request->all());

        return redirect()->route('admin.orders')->with('success', 'Order added successfully.');
    }

    public function edit($id)
    {
        $order = Order::find($id);
        $users = User::all();
        $couriers = Courier::all();
        return view('admin.orders.order-edit', compact('order', 'users', 'couriers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'courier_id' => 'required|integer',
            'payment_method' => 'required|string|max:255',
            'total_cost' => 'required|numeric',
            'address' => 'required|string|max:255',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('admin.orders')->with('success', 'Order updated successfully.');
    }
    public function delete($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.orders.order-delete', compact('order'));
    }
    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        if ($order->elements()->exists()) {
            return redirect()->route('admin.orders')->with('error', 'Cannot delete order because it has associated elements.');
        }
        $order->delete();
        return redirect()->route('admin.orders')->with('success', 'Order has been successfully deleted.');
    }

}
