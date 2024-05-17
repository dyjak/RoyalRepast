@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Checkout</h2>
        @if($cart)
            <form action="{{ route('cart.placeOrder') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="payment_method">Payment Method</label>
                    <select name="payment_method" id="payment_method" class="form-control">
                        <option value="credit_card">Credit Card</option>
                        <option value="paypal">PayPal</option>
                        <!-- Add more payment methods as needed -->
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Place Order</button>
            </form>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
