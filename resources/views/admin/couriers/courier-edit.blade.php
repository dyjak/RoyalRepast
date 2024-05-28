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
        <form action="{{ route('admin.courier.update', ['id' => $courier->id]) }}" method="POST" id="editCourierForm" style="width: 50%">
            <h1 class="d-flex justify-center">Editing Courier (ID: {{$courier->id}})</h1>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $courier->name }}" required maxlength="255">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $courier->surname }}" required maxlength="255">
            </div>
            <div class="mb-3">
                <label for="restaurant_id" class="form-label">Restaurant</label>
                <select class="form-select" id="restaurant_id" name="restaurant_id" required>
                    @foreach($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" {{ $restaurant->id == $courier->restaurant_id ? 'selected' : '' }}>{{ $restaurant->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="vehicle" class="form-label">Vehicle</label>
                <input type="text" class="form-control" id="vehicle" name="vehicle" value="{{ $courier->vehicle }}" required maxlength="255">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
