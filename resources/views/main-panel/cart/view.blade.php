@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Your Cart</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($cart)
            <table class="table">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cart as $id => $details)
                    <tr>
                        <td><img src="{{ asset('storage/meal-imgs/' . $details['image']) }}" style="width: 100px; height: 100px;"></td>
                        <td>{{ $details['name'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ $details['price'] * $details['quantity'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
