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

        $restaurantId = $meal->restaurant_id;

        if (isset($cart[$restaurantId][$meal->id])) {
            $cart[$restaurantId][$meal->id]['quantity'] += $request->quantity;
        } else {
            $cart[$restaurantId][$meal->id] = [
                'name' => $meal->name,
                'quantity' => $request->quantity,
                'price' => $meal->price,
                'image' => $meal->image_path,
                'restaurant_name' => $meal->restaurant->name
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Meal added to cart!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $cartCount = count($cart);
        return view('main-panel.cart.view', compact('cart', 'cartCount'));
    }



    public function updateCart(Request $request, $mealId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = session()->get('cart', []);

        foreach ($cart as $restaurantId => $meals) {
            if (isset($meals[$mealId])) {
                $cart[$restaurantId][$mealId]['quantity'] = $request->quantity;
                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Cart updated successfully!');
            }
        }

        return redirect()->back()->with('error', 'Product not found in cart!');
    }

    public function removeCart($mealId)
    {
        $cart = session()->get('cart', []);

        foreach ($cart as $restaurantId => $meals) {
            if (isset($meals[$mealId])) {
                unset($cart[$restaurantId][$mealId]);

                if (empty($cart[$restaurantId])) {
                    unset($cart[$restaurantId]);
                }

                session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Product removed from cart successfully!');
            }
        }

        return redirect()->back()->with('error', 'Product not found in cart!');
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

        foreach ($cart as $restaurantId => $meals) {
            $order = Order::create([
                'user_id' => Auth::id(),
                'courier_id' => 1,
                'payment_method' => $request->payment_method,
            ]);

            foreach ($meals as $mealId => $details) {
                Order_element::create([
                    'order_id' => $order->id,
                    'meal_id' => $mealId,
                    'quantity' => $details['quantity']
                ]);
            }
        }

        session()->forget('cart');

        return redirect()->route('restaurants.index')->with('success', 'Order placed successfully!');
    }
}
