<div class="mt-5">
    <h2>My Orders</h2>
    @if($orders->isEmpty())
        <p>You have no orders.</p>
    @else
        <table class="table">
            <thead>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Payment Method</th>
                <th>Total Price</th>
                <th>Details</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->created_at->format('d M Y') }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>${{ number_format($order->total_cost, 2) }}</td>
                    <td><a href="{{ route('order.details', $order->id) }}" class="btn btn-primary">View Details</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
</div>
