@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Checkout</h2>
        @if($cart)
            <form action="{{ route('cart.placeOrder') }}" method="POST">
                @csrf
                <div class="form-group">
                    <p>Total Cost: ${{ number_format($totalCost, 2) }}</p>
                    <label for="payment_method">Payment Method</label>
                    <select name="payment_method" id="payment_method" class="form-control">
                        <option value="Card">Credit Card</option>
                        <option value="PayPal">PayPal</option>
                        <option value="GooglePay">GooglePay</option>
                        <option value="ApplePay">ApplePay</option>
                        <option value="Crypto">Crypto</option>
                        <option value="Cash">Cash</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success mt-3">Place Order</button>
            </form>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
