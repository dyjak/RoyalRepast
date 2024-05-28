@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-center items-center">
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
        <div class="form-container" style="width: 50%">
            <h1 class="d-flex justify-center">Edit Restaurant Category (ID: {{$restaurantCategory->id}})</h1>
            <form action="{{ route('admin.restaurant_category.update', ['id' => $restaurantCategory->id]) }}" method="POST" id="editRestaurantCategoryForm">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $restaurantCategory->name }}" required maxlength="255">
                </div>
                <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
        </div>
    </div>
@endsection
