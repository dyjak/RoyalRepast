@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Delete User</h2>
        <p>Are you sure you want to delete user {{ $user->name }} {{ $user->surname }}?</p>
        <form action="{{ route('admin.user.delete', ['id' => $user->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

@endsection
