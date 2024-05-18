@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Order Details</h2>
        <p>Order ID: {{ $order->id }}</p>
        <p>Date: {{ $order->created_at->format('d M Y') }}</p>
        <p>Payment Method: {{ $order->payment_method }}</p>
        <p>Total Price: ${{ $order->elements->sum(fn($item) => $item->meal->price * $item->quantity) }}</p>

        <h3>Order Items:</h3>
        @if($order->elements->isNotEmpty())
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->elements as $element)
                    <tr>
                        <td>{{ $element->meal->name }}</td>
                        <td>{{ $element->quantity }}</td>
                        <td>${{ $element->meal->price }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No items in this order.</p>
        @endif
    </div>
@endsection
