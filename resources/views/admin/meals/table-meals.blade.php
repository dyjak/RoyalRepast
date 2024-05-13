@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

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

        <div class="content-center">
            <a href="{{ route('admin.index') }}" class="btn btn-warning" width="200px;"> <i
                    class="fas fa-arrow-left"></i> </a>
            <h3>Meals Table</h3>
        </div>

        <form action="{{ route('admin.meals') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search"
                       value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Restaurant</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Image Path</th>
                    <th>Description</th>
                    <th>Description 2</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($meals as $meal)
                    <tr>
                        <td>{{ $meal->id }}</td>
                        <td>{{ $meal->name }}</td>
                        <td>{{ $meal->restaurant->name }}</td>
                        <td>{{ $meal->category->name }}</td>
                        <td>{{ $meal->price }}</td>
                        <td>{{ $meal->image_path }}</td>
                        <td>{{ $meal->description }}</td>
                        <td>{{ $meal->description2 }}</td>
                        <td><a href="{{ route('admin.meal.edit', ['id' => $meal->id]) }}"
                               class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ route('admin.meal.delete', ['id' => $meal->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
