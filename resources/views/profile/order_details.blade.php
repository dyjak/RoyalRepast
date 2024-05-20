@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Order Details</h2>
        <p>Order ID: {{ $order->id }}</p>
        <p>Date: {{ $order->created_at->format('d M Y') }}</p>
        <p>Payment Method: {{ $order->payment_method }}</p>
        <p>Courier: {{ $order->courier->name}}, by {{ strtolower($order->courier->vehicle)}}</p>
        <h5 id="countdown" data-created-at="{{ $order->created_at->timestamp }}">40:00</h5>

        <table class="table">
            <thead>
            <tr>
                <th>Meal</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($order->elements as $element)
                <tr>
                    <td>{{ $element->meal->name }}</td>
                    <td>{{ $element->quantity }}</td>
                    <td>${{ number_format($element->meal->price * $element->quantity, 2) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <p><strong>Total Cost: ${{ number_format($order->total_cost, 2) }}</strong></p>
        <p><strong>Delivery address: {{ $order->address }}</strong></p>
    </div>

{{--    /COUNTDOWN--}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function startCountdown(duration, display) {
                var timer = duration, minutes, seconds;
                setInterval(function () {
                    minutes = parseInt(timer / 60, 10);
                    seconds = parseInt(timer % 60, 10);

                    minutes = minutes < 10 ? "0" + minutes : minutes;
                    seconds = seconds < 10 ? "0" + seconds : seconds;

                    display.textContent = minutes + ":" + seconds;

                    if (--timer < 0) {
                        display.textContent = "Time's up!";
                    }
                }, 1000);
            }

            var createdAt = parseInt(document.getElementById('countdown').getAttribute('data-created-at'));
            var now = Math.floor(Date.now() / 1000);
            var elapsed = now - createdAt;
            var remaining = 40 * 60 - elapsed; // 40 minut

            if (remaining > 0) {
                startCountdown(remaining, document.getElementById('countdown'));
            } else {
                document.getElementById('countdown').textContent = "Order delivered!";
            }
        });
    </script>

@endsection
