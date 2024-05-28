@extends('layouts.app')

@section('content')

    <div class="container d-flex justify-center items-center flex-col">
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
        <h1>Delete Courier</h1>
        <h6>Are you sure you want to delete courier {{ $courier->name }} {{ $courier->surname }}?</h6>
        <form action="{{ route('admin.courier.delete', ['id' => $courier->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

@endsection
