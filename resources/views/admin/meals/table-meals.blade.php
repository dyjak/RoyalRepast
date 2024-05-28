@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8" style="width: 100%">

        <!-- Alerts for success and error messages -->
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

        <!-- Header and search form -->
        <div class="d-flex justify-between items-center">
            <a href="{{ route('admin.index') }}" class="btn btn-warning" style="padding: 0 50px;"><i class="fas fa-arrow-left"></i></a>
            <h1>Admin</h1>
            <h3>Meals Table</h3>
        </div>

        <!-- Search form -->
        <form action="{{ route('admin.meals') }}" method="GET" class="mb-3">
            <div class="input-group">
                <select class="form-select" name="column">
                    <option value="name" {{ $column == 'name' ? 'selected' : '' }}>Name</option>
                    <option value="price" {{ $column == 'price' ? 'selected' : '' }}>Price</option>
                    <option value="image_path" {{ $column == 'image_path' ? 'selected' : '' }}>Image Path</option>
                    <option value="description" {{ $column == 'description' ? 'selected' : '' }}>Description</option>
                    <option value="description2" {{ $column == 'description2' ? 'selected' : '' }}>Description 2</option>
                </select>
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ $search }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <!-- Table of meals -->
        <div class="table-responsive">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Restaurant</th>
                    <th>Category</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <!-- Loop through meals and display them -->
                @foreach($meals as $meal)
                    <tr>
                        <td>{{ $meal->id }}</td>
                        <td>{{ $meal->name }}</td>
                        <td>{{ $meal->price }}</td>
                        <!-- Display restaurant name -->
                        <td>{{ $meal->restaurant->name }}</td>
                        <!-- Display category name -->
                        <td>{{ $meal->category->name }}</td>
                        <!-- Links for editing and deleting -->
                        <td><a href="{{ route('admin.meal.edit', ['id' => $meal->id]) }}" class="btn btn-secondary">Edit</a></td>
                        <td><a href="{{ route('admin.meal.delete', ['id' => $meal->id]) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <!-- Button for adding a new meal -->
        <a href="{{ route('admin.meal.create') }}" class="btn btn-success mt-3">Add New Meal</a>
    </div>

    <style>
        /* Add any custom styles here */
    </style>
@endsection
