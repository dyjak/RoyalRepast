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
            <h1 class="d-flex justify-center">Editing Order Element (ID: {{$orderElement->id}})</h1>
            <form action="{{ route('admin.order_element.update', ['id' => $orderElement->id]) }}" method="POST" id="editOrderElementForm">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="order_id" class="form-label">Order ID</label>
                    <select class="form-select" id="order_id" name="order_id" required>
                        @foreach($orders as $order)
                            <option value="{{ $order->id }}" {{ $orderElement->order_id == $order->id ? 'selected' : '' }}>{{ $order->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="meal_id" class="form-label">Meal ID</label>
                    <select class="form-select" id="meal_id" name="meal_id" required>
                        @foreach($meals as $meal)
                            <option value="{{ $meal->id }}" {{ $orderElement->meal_id == $meal->id ? 'selected' : '' }}>{{ $meal->id }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{ $orderElement->quantity }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update Order Element</button>
            </form>
        </div>
    </div>
@endsection
