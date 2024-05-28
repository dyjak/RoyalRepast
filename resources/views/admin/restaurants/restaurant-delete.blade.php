@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-center items-center flex-col">
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
        <h1>Delete Restaurant</h1>
        <h6>Are you sure you want to delete restaurant {{ $restaurant->name }}?</h6>
        <form action="{{ route('admin.restaurant.delete', ['id' => $restaurant->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('admin.restaurants') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
