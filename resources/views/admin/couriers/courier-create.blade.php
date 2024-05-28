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
            <h1 class="d-flex justify-center">Adding a new courier</h1>
            <form action="{{ route('admin.courier.store') }}" method="POST" id="courierForm">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required maxlength="255" placeholder="John">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname" required maxlength="255" placeholder="Doe">
                </div>
                <div class="mb-3">
                    <label for="restaurant_id" class="form-label">Restaurant</label>
                    <select class="form-select" id="restaurant_id" name="restaurant_id" required>
                        <option value="" disabled selected>Select restaurant</option>
                        @foreach($restaurants as $restaurant)
                            <option value="{{ $restaurant->id }}">{{ $restaurant->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="vehicle" class="form-label">Vehicle</label>
                    <input type="text" class="form-control" id="vehicle" name="vehicle" required maxlength="255" placeholder="Car">
                </div>
                <button type="submit" class="btn btn-primary">Add Courier</button>
            </form>
        </div>
    </div>

@endsection
