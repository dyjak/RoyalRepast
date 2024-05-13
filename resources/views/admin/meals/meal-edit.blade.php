@extends('layouts.app')

@section('content')

    <div class="container">
        <h4>Edit Meal (ID:{{$meal->id}})</h4>
        <form action="{{ route('admin.meal.update', ['id' => $meal->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $meal->name }}">
            </div>
            <div class="mb-3">
                <label for="restaurant_id" class="form-label">Restaurant</label>
                <select class="form-control" id="restaurant_id" name="restaurant_id">
                    @foreach($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" {{ $meal->restaurant_id == $restaurant->id ? 'selected' : '' }}>{{ $restaurant->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $meal->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ $meal->price }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ $meal->description }}">
            </div>
            <div class="mb-3">
                <label for="description2" class="form-label">Description 2</label>
                <input type="text" class="form-control" id="description2" name="description2" value="{{ $meal->description2 }}">
            </div>
            <div class="mb-3">
                <label for="image_path" class="form-label">Image Path</label>
                <input type="text" class="form-control" id="image_path" name="image_path" value="{{ $meal->image_path }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
