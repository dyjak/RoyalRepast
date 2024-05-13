@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- Buttons for displaying meal categories -->
                <div class="btn-group-vertical">
                    @foreach($categories as $category)
                        <button class="btn btn-outline-primary category-btn" data-category="{{$category->id}}">{{$category->name}}</button>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div id="mealCategories">
                    @foreach($categories as $category)
                        <div class="meal-category" id="category{{$category->id}}">
                            @foreach($meals->where('category_id', $category->id) as $meal)
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$meal->name}}</h5>
                                        <p class="card-text">{{$meal->description}}</p>
                                        <a href="{{ route('restaurant.show', ['restaurant_id' => $restaurant->id, 'meal_id' => $meal->id]) }}" class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection
