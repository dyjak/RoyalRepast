@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" style="width: 100%">

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="d-flex justify-between items-center">
            <a href="{{ route('admin.index') }}" class="btn btn-warning" style="padding: 0 50px;"><i class="fas fa-arrow-left"></i></a>

            <h1>Admin</h1>
            <h3>Orders Table</h3>
        </div>

        <form action="{{ route('admin.orders') }}" method="GET" class="mb-3">
            <div class="input-group">
                <select class="form-select" name="column">
                    <option value="id" {{ request('column') == 'id' ? 'selected' : '' }}>ID</option>
                    <option value="user_id" {{ request('column') == 'user_id' ? 'selected' : '' }}>User ID</option>
                    <option value="courier_id" {{ request('column') == 'courier_id' ? 'selected' : '' }}>Courier ID</option>
                    <option value="payment_method" {{ request('column') == 'payment_method' ? 'selected' : '' }}>Payment Method</option>
                    <option value="total_cost" {{ request('column') == 'total_cost' ? 'selected' : '' }}>Total Cost</option>
                    <option value="address" {{ request('column') == 'address' ? 'selected' : '' }}>Address</option>
                </select>
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Courier ID</th>
                    <th>Payment Method</th>
                    <th>Total Cost</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user_id }}</td>
                        <td>{{ $order->courier_id }}</td>
                        <td>{{ $order->payment_method }}</td>
                        <td>{{ $order->total_cost }}</td>
                        <td>{{ $order->address }}</td>
                        <td><a href="{{ route('admin.order.edit', ['id' => $order->id]) }}" class="btn btn-secondary">Edit</a></td>
                        <td><a href="{{ route('admin.order.delete', ['id' => $order->id]) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('admin.order.create') }}" class="btn btn-success mt-3">Add New Order</a>
    </div>

@endsection
