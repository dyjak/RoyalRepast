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
        <form action="{{ route('admin.user.update', ['id' => $user->id]) }}" method="POST" id="editUserForm" style="width: 50%">
            <h1 class="d-flex justify-center">Editing User (ID: {{$user->id}})</h1>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required maxlength="255">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Surname</label>
                <input type="text" class="form-control" id="surname" name="surname" value="{{ $user->surname }}" required maxlength="255">
            </div>
            <div class="mb-3">
                <label for="permission" class="form-label">Permission</label>
                <input type="text" class="form-control" id="permission" name="permission" value="{{ $user->permission }}" required maxlength="255">
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ $user->city }}" required maxlength="255">
            </div>
            <div class="mb-3">
                <label for="postal_code" class="form-label">Postal Code</label>
                <input type="text" class="form-control" id="postal_code" name="postal_code" value="{{ $user->postal_code }}" required maxlength="255" pattern="\d{2}-\d{3}">
            </div>
            <div class="mb-3">
                <label for="street" class="form-label">Street</label>
                <input type="text" class="form-control" id="street" name="street" value="{{ $user->street }}" required maxlength="255">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $user->address }}" required maxlength="255">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" required maxlength="255" pattern="\+\d{2} \d{9}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

@endsection
