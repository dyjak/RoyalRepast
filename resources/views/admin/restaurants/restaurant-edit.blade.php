@extends('layouts.app')

@section('content')
    <div class="container d-flex justify-center items-center">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-container" style="width: 50%">
            <h1 class="d-flex justify-center">Editing Restaurant (ID: {{ $restaurant->id }})</h1>
            <form action="{{ route('admin.restaurant.update', ['id' => $restaurant->id]) }}" method="POST" id="restaurantForm">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $restaurant->name }}" required maxlength="255" placeholder="Restaurant Name">
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select" id="category" name="restaurant_category_id" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $restaurant->restaurant_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="logo_path" class="form-label">Logo Path</label>
                    <input type="text" class="form-control" id="logo_path" name="logo_path" value="{{ $restaurant->logo_path }}" maxlength="255" placeholder="Logo Path">
                </div>
                <div class="mb-3">
                    <label for="city" class="form-label">City</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{ $restaurant->city }}" required maxlength="255" placeholder="Restaurant City">
                </div>
                <div class="mb-3">
                    <label for="postal_code" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $restaurant->postal_code }}" required maxlength="255" pattern="\d{2}-\d{3}" placeholder="12-345">
                </div>
                <div class="mb-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" class="form-control" id="street" name="street" value="{{ $restaurant->street }}" required maxlength="255" placeholder="Restaurant Street">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ $restaurant->address }}" required maxlength="255" placeholder="Restaurant Address">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $restaurant->phone }}" required maxlength="255" pattern="\+\d{2} \d{9}" placeholder="+12 123456789">
                </div>
                <div class="mb-3">
                    <label for="delivery_price" class="form-label">Delivery Price</label>
                    <input type="text" class="form-control" id="delivery_price" name="delivery_price" value="{{ $restaurant->delivery_price }}" required maxlength="255" placeholder="Delivery Price">
                </div>
                <button type="submit" class="btn btn-primary">Update Restaurant</button>
            </form>
        </div>
    </div>
@endsection
