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
            @foreach($cart as $restaurantId => $meals)
                <h3>{{ $meals[array_key_first($meals)]['restaurant_name'] }}</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($meals as $id => $details)
                        <tr>
                            <td><img src="{{ asset('storage/meal-imgs/' . $details['image']) }}"
                                     style="width: 100px; height: 100px;"></td>
                            <td>{{ $details['name'] }}</td>
                            <td>
                                <form action="{{ route('cart.update', $id) }}" method="post">
                                    @csrf
                                    @method('patch')
                                    <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1"
                                           class="form-control w-25 d-inline-block">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                            </td>
                            <td>${{ $details['price'] * $details['quantity'] }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach
            <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
