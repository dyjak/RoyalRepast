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
            <h1 class="d-flex justify-center">Adding a new order element</h1>
            <form action="{{ route('admin.order_element.store') }}" method="POST" id="orderElementForm">
                @csrf
                <div class="mb-3">
                    <label for="order_id" class="form-label">Order ID</label>
                    <select class="form-select" id="order_id" name="order_id" required>
                        @foreach($orders as $order)
                            <option value="{{ $order->id }}">{{ $order->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="meal_id" class="form-label">Meal ID</label>
                    <select class="form-select" id="meal_id" name="meal_id" required>
                        @foreach($meals as $meal)
                            <option value="{{ $meal->id }}">{{ $meal->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Order Element</button>
            </form>
        </div>
    </div>
@endsection
