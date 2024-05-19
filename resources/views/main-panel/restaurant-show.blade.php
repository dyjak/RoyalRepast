@extends('layouts.app')

@section('content')

    <div class="container justify-center items-center">
        <div class="card-header mb-6">
            @include('main-panel.restaurant-heading')
        </div>
        <br>
        <div class="row flex justify-center mt-6">
            <div class="col-md-3">
                <div class="btn-group-vertical mb-3">
                    <button class="btn btn-outline-primary category-btn active" data-category="all">All</button>
                    @foreach($nonEmptyCategories as $category)
                        <button class="btn btn-outline-primary category-btn"
                                data-category="{{$category->id}}">{{$category->name}}</button>
                    @endforeach
                </div>
                <div class="contact-info p-2" style="background-color: var(--primary-color);">
                    <p><i class="fas fa-utensils"></i> {{$restaurant->category->name}}</p>
                    <p><i class="fas fa-envelope"></i> {{$restaurant->email}}</p>
                    <p><i class="fas fa-phone"></i> {{$restaurant->phone}}</p>
                </div>
            </div>
            <div class="col-md-9">
                <div id="mealCategories">
                    <div class="meal-category row" id="categoryall">
                        @foreach($meals as $meal)
                            <div class="col-md-6 mb-3">
                                <div class="card meal-card">
                                    <img src="{{ asset('storage/meal-imgs/' . $meal->image_path) }}"
                                         class="img-fluid rounded-start meal-image" alt="Meal Image">
                                    <div class="card-body flex flex-col justify-center ">
                                        <h5 class="card-title">{{$meal->name}}</h5>
                                        <p class="card-text">{{$meal->description}}</p>
                                        <a href="{{ route('restaurant.show', ['restaurant_id' => $restaurant->id, 'meal_id' => $meal->id]) }}"
                                           class="btn btn-primary">View Details</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @foreach($nonEmptyCategories as $category)
                        <div class="meal-category row" id="category{{$category->id}}" style="display: none;">
                            @foreach($meals->where('category_id', $category->id) as $meal)
                                <div class="col-md-6 mb-3">
                                    <div class="card meal-card">
                                        <img src="{{ asset('storage/meal-imgs/' . $meal->image_path) }}"
                                             class="img-fluid rounded-start meal-image" alt="Meal Image">
                                        <div class="card-body flex flex-col justify-center ">
                                            <h5 class="card-title">{{$meal->name}}</h5>
                                            <p class="card-text">{{$meal->description}}</p>
                                            <a href="{{ route('restaurant.show', ['restaurant_id' => $restaurant->id, 'meal_id' => $meal->id]) }}"
                                               class="btn btn-primary">View Details</a>
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



    <style>
        .card {
            max-width: 800px;
        }

        .meal-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .meal-card {
            height: 100%;
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
                flex: 1 1 calc(50% - 10px); /* 2 przyciski w rzędzie na średnich ekranach */
            }
        }

        @media (max-width: 480px) {
            .category-btn {
                flex: 1 1 100%; /* 1 przycisk w rzędzie na mniejszych ekranach */
            }
        }

        @media (max-width: 768px) {
            .meal-card {
                flex: 1 1 calc(50% - 10px); /* 2 karty w rzędzie na średnich ekranach */
            }
        }

        @media (max-width: 480px) {
            .meal-card {
                flex: 1 1 100%; /* 1 karta w rzędzie na mniejszych ekranach */
            }
        }

    </style>

@endsection
