@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="row g-0">
                <div class="col-md-6">
                    <img src="{{ asset('storage/meal-imgs/' . $meal->image_path) }}" class="img-fluid rounded-start"
                         alt="{{ $meal->name }}">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <img src="{{ asset('storage/logo/' . $meal->restaurant->logo_path . '.png') }}"
                                     alt="Restaurant Logo"
                                     style="width: 50px; height: 50px; margin-right: 10px;">
                            </div>
                            <div>
                                <h3 class="card-text">{{ $meal->restaurant->name }}</h3>
                            </div>
                        </div>
                        <hr>
                        <h2 class="card-title">{{ $meal->name }}</h2>
                        <h2 class="card-text">Price: ${{ $meal->price }}</h2>
                        <hr>
                        <h4 class="card-text">{{ $meal->description }}</h4>
                        <h6 class="card-text">{{ $meal->description2 }}</h6>
                        <h6 class="card-text">Category: {{ $meal->category->name }}</h6>

                        <form action="{{ route('cart.add', $meal->id) }}" method="POST" class="mt-3">
                            @csrf
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" value="1"
                                       min="1">
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Add to Cart</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <hr>
        <div class="card-body">
            <!-- Restaurant Panel -->
            <div class="card mb-3">
                <div class="card-header">
                    More from <b>{{$meal->restaurant->name}}</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        @php
                            $sampleMeals = [];
                            while (count($sampleMeals) < 4) {
                                $randomMeal = $meal->restaurant->meals->random();
                                if (!in_array($randomMeal, $sampleMeals)) {
                                    $sampleMeals[] = $randomMeal;
                                }
                            }
                        @endphp
                        @foreach($sampleMeals as $meal_i)
                            <div class="col-md-3 mb-3">
                                <div class="card h-100">
                                    <div class="clickable-card"
                                         onclick="window.location.href='{{ route('meal.details', ['meal' => $meal_i->id]) }}'">
                                        <img src="{{ asset('storage/meal-imgs/' . $meal_i->image_path) }}"
                                             class="card-img-top" alt="{{ $meal_i->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $meal_i->name }}</h5>
                                            <p class="card-text">{{ $meal_i->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Category Panel -->
            <div class="card">
                <div class="card-header">
                    More <b>{{$meal->category->name}}</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        {{--                        @php--}}
                        {{--                            $sampleMeals = [];--}}
                        {{--                            while (count($sampleMeals) < 4) {--}}
                        {{--                                $randomMeal = $meal->category->meals->random();--}}
                        {{--                                if (!in_array($randomMeal, $sampleMeals)) {--}}
                        {{--                                    $sampleMeals[] = $randomMeal;--}}
                        {{--                                }--}}
                        {{--                            }--}}
                        {{--                        @endphp--}}
                        @foreach($sampleMeals as $meal_i)
                            <div class="col-md-3 mb-3">
                                <div class="card h-100">
                                    <div class="clickable-card"
                                         onclick="window.location.href='{{ route('meal.details', ['meal' => $meal_i->id]) }}'">
                                        <img src="{{ asset('storage/meal-imgs/' . $meal_i->image_path) }}"
                                             class="card-img-top" alt="{{ $meal_i->name }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $meal_i->name }}</h5>
                                            <p class="card-text">{{ $meal_i->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
