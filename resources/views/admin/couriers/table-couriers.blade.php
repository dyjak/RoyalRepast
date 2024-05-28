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
            <h3>Couriers Table</h3>
        </div>

        <form action="{{ route('admin.couriers') }}" method="GET" class="mb-3">
            <div class="input-group">
                <select class="form-select" name="column">
                    <option value="name" {{ request('column') == 'name' ? 'selected' : '' }}>Name</option>
                    <option value="surname" {{ request('column') == 'surname' ? 'selected' : '' }}>Surname</option>
                    <option value="vehicle" {{ request('column') == 'vehicle' ? 'selected' : '' }}>Vehicle</option>
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
                    <th>Surname</th>
                    <th>Restaurant</th>
                    <th>Vehicle</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($couriers as $courier)
                    <tr>
                        <td>{{ $courier->id }}</td>
                        <td>{{ $courier->name }}</td>
                        <td>{{ $courier->surname }}</td>
                        <td>{{ $courier->restaurant->name }}</td>
                        <td>{{ $courier->vehicle }}</td>
                        <td><a href="{{ route('admin.courier.edit', ['id' => $courier->id]) }}" class="btn btn-secondary">Edit</a></td>
                        <td><a href="{{ route('admin.courier.delete', ['id' => $courier->id]) }}" class="btn btn-danger">Delete</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <a href="{{ route('admin.courier.create') }}" class="btn btn-success mt-3">Add New Courier</a>
    </div>

@endsection
