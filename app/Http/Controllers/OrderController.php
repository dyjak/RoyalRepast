<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('order_elements.meal')->get();
        return view('profile.orders', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::with('elements.meal')->findOrFail($id);
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }
        return view('profile.order_details', compact('order'));
    }
}
