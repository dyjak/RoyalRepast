@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Delete Meal</h2>
        <p>Are you sure you want to delete meal {{ $meal->name }}?</p>
        <form action="{{ route('admin.meal.delete', ['id' => $meal->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('admin.meals') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

@endsection
