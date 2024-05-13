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
            <h3>User Table</h3>
        </div>

        <form action="{{ route('admin.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search..." name="search"
                       value="{{request('search')}}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Email</th>
                    <th>Permission</th>
                    <th>City</th>
                    <th>Postal Code</th>
                    <th>Street</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->surname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->permission }}</td>
                        <td>{{ $user->city }}</td>
                        <td>{{ $user->postal_code }}</td>
                        <td>{{ $user->street }}</td>
                        <td>{{ $user->address }}</td>
                        <td>{{ $user->phone }}</td>
                        <td><a href="{{ route('admin.user.edit', ['id' => $user->id]) }}"
                               class="btn btn-primary">Edit</a></td>
                        <td><a href="{{ route('admin.user.delete', ['id' => $user->id]) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <a href="{{ route('admin.user.create') }}" class="btn btn-success">Add New User</a>
    </div>

@endsection
