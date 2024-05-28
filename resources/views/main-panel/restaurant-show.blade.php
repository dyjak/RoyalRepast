@extends('layouts.app')

@section('content')
    <div class="container justify-content-center align-items-center">
        <!-- Restaurant Information -->
        <div class="card-header mb-6">
            <div class="d-flex align-items-center justify-content-center">
                <div>
                    <img src="{{ asset('storage/logo/' . $restaurant->logo_path . '.png') }}" alt="Restaurant Logo"
                         style="width: 200px; height: 200px; margin-right: 10px;">
                </div>
                <div class="items-center justify-content-center">
                    <h1 class="card-text display-4">{{ $restaurant->name }}</h1>
                </div>
            </div>
            <div class="contact-info p-4 d-flex justify-content-between"
                 style="background-color: var(--bs-secondary); border-radius: 20px; font-size: large;">
                <p><i class="fas fa-utensils"></i> {{$restaurant->category->name}}</p>
                <p><i class="fas fa-envelope"></i> {{$restaurant->email}}</p>
                <p><i class="fas fa-phone"></i> <a href="tel:{{$restaurant->phone}}">{{$restaurant->phone}}</a></p>
            </div>
        </div>
        <br>
        <!-- Categories and Meals -->
        <div class="row justify-content-center mt-6">
            <div class="col-md-3">
                <form action="{{ route('restaurant.filterByCategory', $restaurant->id) }}" method="POST" class="btn-group-vertical mb-3">
                    @csrf
                    <button type="submit" name="category" value="all" class="btn btn-outline-primary category-btn{{ $selected_category === 'all' ? ' active' : '' }}">All</button>
                    @foreach($categories as $category)
                        <button type="submit" name="category" value="{{$category->name}}" class="btn btn-outline-primary category-btn{{ $selected_category === $category->name ? ' active' : '' }}">{{$category->name}}</button>
                    @endforeach
                </form>
            </div>
            <div class="col-md-9">
                <div id="mealCategories">
                    <div class="meal-category row d-flex justify-content-center" id="categoryall">
                        @foreach($meals as $meal)
                            <div class="col-12 col-md-6 mb-3 meal-item">
                                <a href="{{ route('meal.details', $meal->id) }}" class="card meal-card">
                                    <img src="{{ asset('storage/meal-imgs/' . $meal->image_path) }}"
                                         class="img-fluid rounded-start meal-image" alt="Meal Image">
                                    <div class="card-body flex flex-col justify-content-center">
                                        <h5 class="card-title">{{$meal->name}}</h5>
                                        <p class="card-text">{{$meal->description}}</p>
                                        <p class="card-text text-center"><b>${{ number_format($meal->price, 2) }}</b>
                                        </p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @foreach($nonEmptyCategories as $category)
                        <div class="meal-category row" id="category{{$category->id}}" style="display: none;">
                            @foreach($meals->where('category_id', $category->id) as $meal)
                                <div class="col-12 col-md-6 mb-3 meal-item">
                                    <a href="{{ route('meal.details', $meal->id) }}" class="card meal-card">
                                        <img src="{{ asset('storage/meal-imgs/' . $meal->image_path) }}"
                                             class="img-fluid rounded-start meal-image" alt="Meal Image">
                                        <div class="card-body flex flex-col justify-content-center">
                                            <h5 class="card-title">{{$meal->name}}</h5>
                                            <p class="card-text">{{$meal->description}}</p>
                                            <p class="card-text text-center">
                                                <b>${{ number_format($meal->price, 2) }}</b></p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <style>

        .card {
            max-width: 1000px;
        }

        .meal-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .meal-card {
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: inherit;
            overflow: hidden;
        }

        .meal-card:hover {
            background-color: #f8f9fa;
            transition: background-color 0.3s ease;
        }

        .contact-info p {
            margin: 0;
            padding: 5px 0;
            display: flex;
            align-items: center;
        }

        .contact-info p i {
            margin-right: 10px;
        }

        .category-btn {
            margin-bottom: 5px;
            font-size: large;
        }

        .category-btn.active {
            background-color: var(--4-color);
            border-color: var(--4-color);
            color: white;
        }

        .btn-group-vertical {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .category-btn {
            flex: 1 1 calc(33.333% - 10px);
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .category-btn {
                flex: 1 1 calc(50% - 10px);
            }

            .contact-info {
                flex-direction: column;
            }
        }

        @media (max-width: 480px) {
            .category-btn {
                flex: 1 1 100%;
            }
        }

        @media (max-width: 768px) {
            .meal-card {
                flex: 1 1 calc(50% - 10px);
            }
        }

        @media (max-width: 480px) {
            .meal-card {
                flex: 1 1 100%;
            }
        }

        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            text-align: center;
        }
    </style>

@endsection
