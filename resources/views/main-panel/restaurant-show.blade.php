@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row flex justify-center">
            <h1 class="text-center">Meals</h1>
            <div class="col-md-3">
                <div class="btn-group-vertical">
                    <button class="btn btn-outline-primary category-btn active" data-category="all">All</button>
                    @foreach($nonEmptyCategories as $category)
                        <button class="btn btn-outline-primary category-btn"
                                data-category="{{$category->id}}">{{$category->name}}</button>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div id="mealCategories">
                    <div class="meal-category" id="categoryall">
                        @foreach($meals as $meal)
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/meal-imgs/' . $meal->image_path) }}"
                                             class="img-fluid rounded-start meal-image" alt="Meal Image">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body flex flex-col justify-center ">
                                            <h5 class="card-title">{{$meal->name}}</h5>
                                            <p class="card-text">{{$meal->description}}</p>
                                            <br>
                                            <a href="{{ route('restaurant.show', ['restaurant_id' => $restaurant->id, 'meal_id' => $meal->id]) }}"
                                               class="btn btn-primary">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @foreach($nonEmptyCategories as $category)
                        <div class="meal-category" id="category{{$category->id}}" style="display: none;">
                            @foreach($meals->where('category_id', $category->id) as $meal)
                                <div class="card mb-3">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/meal-imgs/' . $meal->image_path) }}"
                                                 class="img-fluid rounded-start meal-image" alt="Meal Image">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body flex flex-col justify-center ">
                                                <h5 class="card-title">{{$meal->name}}</h5>
                                                <p class="card-text">{{$meal->description}}</p>
                                                <br>
                                                <a href="{{ route('restaurant.show', ['restaurant_id' => $restaurant->id, 'meal_id' => $meal->id]) }}"
                                                   class="btn btn-primary">View Details</a>
                                            </div>
                                        </div>
                                    </div>
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
            max-width: 800px;
        }

        .meal-image {
            width: 300px;
            height: 200px;
            object-fit: cover;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const categoryButtons = document.querySelectorAll('.category-btn');

            categoryButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const categoryId = this.getAttribute('data-category');
                    const mealCategories = document.querySelectorAll('.meal-category');

                    categoryButtons.forEach(btn => {
                        btn.classList.remove('active');
                    });
                    this.classList.add('active');

                    mealCategories.forEach(category => {
                        category.style.display = 'none';
                    });

                    if (categoryId === "all") {
                        mealCategories.forEach(category => {
                            category.style.display = 'block';
                        });
                    } else {
                        const selectedCategory = document.querySelector(`#category${categoryId}`);
                        selectedCategory.style.display = 'block';
                    }
                });
            });
        });
    </script>

@endsection
