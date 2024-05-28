@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-center items-center flex-col">
        <!-- Display success and error messages -->
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
        <h1>Delete Meal</h1>
        <h6>Are you sure you want to delete meal "{{ $meal->name }}"?</h6>
        <form action="{{ route('admin.meal.delete', ['id' => $meal->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
