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
            <h3>Order Elements Table</h3>
        </div>

        <form action="{{ route('admin.order_elements') }}" method="GET" class="mb-3">
            <div class="input-group">
                <select class="form-select" name="column">
                    <option value="id" {{ request('column') == 'id' ? 'selected' : '' }}>ID</option>
                    <option value="order_id" {{ request('column') == 'order_id' ? 'selected' : '' }}>Order ID</option>
                    <option value="meal_id" {{ request('column') == 'meal_id' ? 'selected' : '' }}>Meal ID</option>
                    <option value="quantity" {{ request('column') == 'quantity' ? 'selected' : '' }}>Quantity</option>
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
                    <th>Order ID</th>
                    <th>Meal ID</th>
                    <th>Quantity</th>
                    <th>Created At</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($orderElements as $element)
                    <tr>
                        <td>{{ $element->id }}</td>
                        <td>{{ $element->order_id }}</td>
                        <td>{{ $element->meal_id }}</td>
                        <td>{{ $element->quantity }}</td>
                        <td>{{ $element->created_at }}</td>
                        <td><a href="{{ route('admin.order_element.edit', ['id' => $element->id]) }}" class="btn btn-secondary">Edit</a></td>
                        <td><a href="{{ route('admin.order_element.delete', ['id' => $element->id]) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('admin.order_element.create') }}" class="btn btn-success mt-3">Add New Order Element</a>
    </div>
@endsection
