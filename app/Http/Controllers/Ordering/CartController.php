<?php

namespace App\Http\Controllers\Ordering;

use Illuminate\Http\Request;
use App\Models\Meal;
use App\Models\Order;
use App\Models\Order_element;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request, Meal $meal)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        $cart[$meal->id] = [
            'name' => $meal->name,
            'quantity' => $request->quantity,
            'price' => $meal->price,
            'image' => $meal->image_path
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Meal added to cart!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('main-panel.cart.view', compact('cart'));
    }

    public function checkout()
    {
        $cart = session()->get('cart', []);
        return view('main-panel.cart.checkout', compact('cart'));
    }

    public function placeOrder(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Your cart is empty');
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'courier_id' => 1, // Placeholder, adjust as needed
            'payment_method' => $request->payment_method,
        ]);

        foreach ($cart as $mealId => $details) {
            Order_element::create([
                'order_id' => $order->id,
                'meal_id' => $mealId,
                'quantity' => $details['quantity']
            ]);
        }

        session()->forget('cart');

        return redirect()->route('restaurants.index')->with('success', 'Order placed successfully!');
    }
}
