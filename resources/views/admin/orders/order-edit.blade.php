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
        <form action="{{ route('admin.order.update', ['id' => $order->id]) }}" method="POST" id="editOrderForm" style="width: 50%">
            <h1 class="d-flex justify-center">Editing Order (ID: {{$order->id}})</h1>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-select" id="user_id" name="user_id" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }} {{ $user->surname }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="courier_id" class="form-label">Courier</label>
                <select class="form-select" id="courier_id" name="courier_id" required>
                    @foreach($couriers as $courier)
                        <option value="{{ $courier->id }}" {{ $order->courier_id == $courier->id ? 'selected' : '' }}>
                            {{ $courier->name }} {{ $courier->surname }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="payment_method" class="form-label">Payment Method</label>
                <input type="text" class="form-control" id="payment_method" name="payment_method" value="{{ $order->payment_method }}" required>
            </div>
            <div class="mb-3">
                <label for="total_cost" class="form-label">Total Cost</label>
                <input type="text" class="form-control" id="total_cost" name="total_cost" value="{{ $order->total_cost }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $order->address }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
