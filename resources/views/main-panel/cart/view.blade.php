@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center">Your Cart</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if($cart)
            @foreach($cart as $restaurantId => $meals)
                @php
                    $restaurantTotal = 0;
                @endphp
                <div class="restaurant-section mb-4 p-3 rounded" style="background-color: var(--2-color); border: 2px solid var(--4-color);">
                    <div class="d-flex align-items-center justify-center mb-3">
                        <img src="{{ asset('storage/logo/' . $restaurantDetails[$restaurantId]['logo_path'] . '.png') }}" alt="Restaurant Logo" style="width: 100px; height: 100px; margin-right: 10px;">
                        <h3>{{ $restaurantDetails[$restaurantId]['name'] }}</h3>
                    </div>
                    @foreach($meals as $id => $details)
                        <div class="meal-section mt-3 p-3 rounded d-flex align-items-center justify-between" style="background-color: var(--3-color); border: 2px solid var(--4-color);">
                            <div>
                                <img src="{{ asset('storage/meal-imgs/' . $details['image']) }}" alt="Meal Image" style="width: 100px; height: 100px; object-fit: cover; margin-right: 10px;">
                                <h5>{{ $details['name'] }}</h5>
                            </div>
                            <form action="{{ route('cart.update', $id) }}" method="post">
                                @csrf
                                @method('patch')
                                <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control d-inline-block" style="width: 50px;">
                                <button type="submit" class="btn btn-primary ml-2"><i class="fas fa-sync-alt"></i> Update</button>
                            </form>
                            <p class="mb-0">Price: ${{ number_format($details['price'] * $details['quantity'], 2) }}</p>
                            <form action="{{ route('cart.remove', $id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger mt-2"><i class="fas fa-trash-alt"></i> Remove</button>
                            </form>
                        </div>
                        @php
                            $restaurantTotal += $details['price'] * $details['quantity'];
                        @endphp
                    @endforeach
                    <p class="mb-0 mt-3">Delivery Price:
                        @if($restaurantDeliveryCost == 0)
                            <del>${{ number_format($restaurantDetails[$restaurantId]['delivery_price'], 2) }}</del>
                            Free
                        @else
                            ${{ number_format($restaurantDetails[$restaurantId]['delivery_price'], 2) }}
                        @endif
                        <i class="fas fa-truck"></i>
                    </p>
                    <p class="mb-0">Subtotal: ${{ number_format(($restaurantTotal + $restaurantDeliveryCost), 2) }}</p>
                </div>
            @endforeach
            <h3 class="text-center">Total Cost: ${{ number_format($totalCost, 2) }}</h3>
            <div class="d-flex justify-center">
                <a href="{{ route('cart.checkout') }}" class="btn btn-lg btn-primary mx-3">Proceed to Checkout <i class="fas fa-arrow-right"></i></a>
            </div>
        @else
            <p class="text-center">Your cart is empty.</p>
        @endif
    </div>
@endsection
