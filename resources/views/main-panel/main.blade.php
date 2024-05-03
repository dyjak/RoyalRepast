@php use App\Models\Meal; @endphp
@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-4">Restaurants</h1>
    <div class="row">
        @foreach($restaurants as $restaurant)
            <div class="col-md-12 mb-4">
                <div class="card">
                    <div class="card-header flex-row">
                        <div class="d-flex align-items-center justify-center">
                            <div>
                                <img src="{{ asset('storage/logo/' . $restaurant->logo_path . '.png') }}" alt="Restaurant Logo"
                                     style="width: 80px; height: 80px; margin-right: 10px;">
                            </div>
                            <div>
                                <h3 class="card-text">{{ $restaurant->name }}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @php
                            $meals = Meal::where('restaurant_id', $restaurant->id)->get(); //???
                            $sampleMeals = $meals->isNotEmpty() ? $meals->random(4) : [];
                        @endphp
                        <!-- Sample Meals -->
                        <div class="row">
                            @foreach($sampleMeals as $meal)
                                <div class="col-md-3 mb-3">
                                    <div class="card h-100">
                                        <div class="clickable-card" onclick="window.location.href='{{ route('meal.details', ['meal' => $meal->id]) }}'">
                                            <img src="{{ asset('storage/meal-imgs/' . $meal->image_path) }}"
                                                 class="card-img-top" alt="{{ $meal->name }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $meal->name }}</h5>
                                                <p class="card-text">{{ $meal->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="btn btn-primary view-more-meals-btn"
                                onclick="toggleCollapse('mealPanel{{ $restaurant->id }}')"
                                aria-expanded="false" aria-controls="mealPanel{{ $restaurant->id }}">
                            More...
                        </button>
                        <!-- Button to Expand -->
{{--                        <a href="#mealPanel{{ $restaurant->id }}" class="btn btn-primary stretched-link view-more-meals-btn"--}}
{{--                           data-bs-toggle="collapse" aria-expanded="false"--}}
{{--                           aria-controls="mealPanel{{ $restaurant->id }}">View More Meals</a>--}}
                    </div>
                    <div class="collapse" id="mealPanel{{ $restaurant->id }}">
                        <!-- All Meals for Restaurant -->
                        <div class="row">
                            @if($meals->isNotEmpty())
                                @foreach($meals as $meal)
                                    <div class="col-md-4 mb-3">
                                        <div class="card h-100">
                                            <div class="clickable-card" onclick="window.location.href='{{ route('meal.details', ['meal' => $meal->id]) }}'">
                                                <img src="{{ asset('storage/meal-imgs/' . $meal->image_path) }}"
                                                     class="card-img-top" alt="{{ $meal->name }}">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $meal->name }}</h5>
                                                    <p class="card-text">{{ $meal->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12">
                                    <p>No meals available for this restaurant.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
