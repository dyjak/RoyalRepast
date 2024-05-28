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
            <h3>Restaurants Table</h3>
        </div>

        <form action="{{ route('admin.restaurants') }}" method="GET" class="mb-3">
            <div class="input-group">
                <select class="form-select" name="column">
                    <option value="name" {{ request('column') == 'name' ? 'selected' : '' }}>Name</option>
                    <option value="city" {{ request('column') == 'city' ? 'selected' : '' }}>City</option>
                    <option value="postal_code" {{ request('column') == 'postal_code' ? 'selected' : '' }}>Postal code</option>
                    <option value="street" {{ request('column') == 'street' ? 'selected' : '' }}>Street</option>
                    <option value="address" {{ request('column') == 'address' ? 'selected' : '' }}>Address</option>
                    <option value="phone" {{ request('column') == 'phone' ? 'selected' : '' }}>Phone</option>
                    <option value="delivery_price" {{ request('column') == 'delivery_price' ? 'selected' : '' }}>Delivery Price</option>
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
                    <th>Name</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Street</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Delivery Price</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($restaurants as $restaurant)
                    <tr>
                        <td>{{ $restaurant->id }}</td>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ $restaurant->city }}</td>
                        <td>{{ $restaurant->postal_code }}</td>
                        <td>{{ $restaurant->street }}</td>
                        <td>{{ $restaurant->address }}</td>
                        <td>{{ $restaurant->phone }}</td>
                        <td>{{ $restaurant->delivery_price }}</td>
                        <td><a href="{{ route('admin.restaurant.edit', ['id' => $restaurant->id]) }}" class="btn btn-secondary">Edit</a></td>
                        <td><a href="{{ route('admin.restaurant.delete', ['id' => $restaurant->id]) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('admin.restaurant.create') }}" class="btn btn-success mt-3">Add New Restaurant</a>
    </div>

@endsection
