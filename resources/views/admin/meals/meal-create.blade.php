@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="form-container">
            <form action="{{ route('admin.meal.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3">
                    <label for="restaurant_id" class="form-label">Restaurant</label>
                    <select class="form-control" id="restaurant_id" name="restaurant_id">
                        @foreach($restaurants as $restaurant)
                            <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Category</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <input type="text" class="form-control" id="description" name="description">
                </div>
                <div class="mb-3">
                    <label for="description2" class="form-label">Description 2</label>
                    <input type="text" class="form-control" id="description2" name="description2">
                </div>
                <div class="mb-3">
                    <label for="image_path" class="form-label">Image Path</label>
                    <input type="text" class="form-control" id="image_path" name="image_path">
                </div>
                <button type="submit" class="btn btn-primary">Add Meal</button>
            </form>
        </div>
    </div>

@endsection
