@extends('layouts.app')


@section('content')


    <div class="container mt-5">
        <h1 class="text-center mb-4">Administrator</h1>
        <div class="row justify-content-center">
            <div class="col-md-4 flex justify-center">
                <a href="{{ route('admin.users') }}" class="btn btn-dark btn-lg btn-block mb-3" style="min-width: 200px;">Users</a>
            </div>
            <div class="col-md-4 flex justify-center">
                <a href="{{ route('admin.meals') }}" class="btn btn-dark btn-lg btn-block mb-3" style="min-width: 200px;">Meals</a>
            </div>
            <div class="col-md-4 flex justify-center">
                <a href="{{ route('admin.restaurants') }}" class="btn btn-dark btn-lg btn-block mb-3" style="min-width: 200px;">Restaurants</a>
            </div>
            <div class="col-md-4 flex justify-center">
                <a href="{{ route('admin.couriers') }}" class="btn btn-dark btn-lg btn-block mb-3" style="min-width: 200px;">Couriers</a>
            </div>
            <div class="col-md-4 flex justify-center">
                <a href="{{ route('admin.orders') }}" class="btn btn-dark btn-lg btn-block mb-3" style="min-width: 200px;">Orders</a>
            </div>
            <div class="col-md-4 flex justify-center">
                <a href="{{ route('admin.order_elements') }}" class="btn btn-dark btn-lg btn-block mb-3" style="min-width: 200px;">Order Elements</a>
            </div>
            <div class="col-md-4 flex justify-center">
                <a href="{{ route('admin.meal_categories') }}" class="btn btn-dark btn-lg btn-block mb-3" style="min-width: 200px;">Meal Categories</a>
            </div>
            <div class="col-md-4 flex justify-center">
                <a href="{{ route('admin.restaurant_categories') }}" class="btn btn-dark btn-lg btn-block mb-3" style="min-width: 200px;">Restaurant Categories</a>
            </div>
        </div>
    </div>



@endsection
