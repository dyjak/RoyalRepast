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
                <h3>{{ $restaurantDetails[$restaurantId]['name'] }}</h3>
                <p>Delivery Price:
                    @if($restaurantDetails[$restaurantId]['delivery_price'] == 0)
                        <del>${{ number_format($restaurantDetails[$restaurantId]['delivery_price'], 2) }}</del>
                        Free
                    @else
                        ${{ number_format($restaurantDetails[$restaurantId]['delivery_price'], 2) }}
                    @endif
                </p>
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
                    @php
                        $restaurantTotal = 0;
                    @endphp
                    @foreach($meals as $id => $details)
                        @php
                            $itemTotal = $details['price'] * $details['quantity'];
                            $restaurantTotal += $itemTotal;
                        @endphp
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
                            <td>${{ number_format($itemTotal, 2) }}</td>
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
                <p>Delivery Price:
                    @if($restaurantDeliveryCost == 0)
                        <del>${{ number_format($restaurantDetails[$restaurantId]['delivery_price'], 2) }}</del>
                        Free
                    @else
                        ${{ number_format($restaurantDetails[$restaurantId]['delivery_price'], 2) }}
                    @endif
                </p>
                <p>Subtotal:
                    ${{ number_format(($restaurantTotal + $restaurantDeliveryCost), 2) }}
                </p>
                <hr>
            @endforeach
            <h3>Total Cost: ${{ number_format($totalCost, 2) }}</h3>
            <a href="{{ route('cart.checkout') }}" class="btn btn-primary">Proceed to Checkout</a>
        @else
            <p>Your cart is empty.</p>
        @endif
    </div>
@endsection
