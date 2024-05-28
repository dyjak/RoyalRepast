@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-center items-center">
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
        <!-- Form for editing a meal -->
        <form action="{{ route('admin.meal.update', ['id' => $meal->id]) }}" method="POST" enctype="multipart/form-data" id="editMealForm" style="width: 50%">
            <h1 class="d-flex justify-center">Editing Meal (ID: {{$meal->id}})</h1>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $meal->name }}" required maxlength="255">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" min="0" class="form-control" id="price" name="price" value="{{ $meal->price }}" required>
            </div>
            <div class="mb-3">
                <label for="restaurant_id" class="form-label">Restaurant</label>
                <select class="form-select" id="restaurant_id" name="restaurant_id" required>
                    <!-- Loop through restaurants and create options -->
                    @foreach($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" {{ $meal->restaurant_id == $restaurant->id ? 'selected' : '' }}>{{ $restaurant->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <!-- Loop through categories and create options -->
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $meal->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image Path</label>
                <input type="text" class="form-control" id="image" name="image_path" value="{{ $meal->image_path }}" placeholder="Enter image path">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3">{{ $meal->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="description2" class="form-label">Description 2</label>
                <textarea class="form-control" id="description2" name="description2" rows="3">{{ $meal->description2 }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
