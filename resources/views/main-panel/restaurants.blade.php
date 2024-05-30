@php
    use App\Models\Meal;
@endphp

@extends('layouts.app')

@section('content')
    <div class="container mt-5">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @include('main-panel.controls')

        @if($restaurants->isEmpty())
            <p class="text-center">No restaurants... Go cook st by yrself lol</p>
        @else
            <div class="row">
                @foreach($restaurants as $restaurant)
                    <div class="col-md-12 mb-5 mt-4">
                        <div class="card">
                            <div class="card-header flex-row">
                                <a href="{{ route('restaurant.show', ['restaurant_id' => $restaurant->id]) }}"
                                   class="text-decoration-none">
                                    @include('main-panel.restaurant-heading')
                                </a>

                                <div class="card-body d-flex">
                                    <div class="blur-box"></div>
                                    @php
                                        $meals = Meal::where('restaurant_id', $restaurant->id)->inRandomOrder()->get();
                                    @endphp
                                    <div class="horizontal-scroll-container">
                                        @foreach($meals as $meal)
                                            <div class="card h-100 card-second">
                                                <div class="clickable-card"
                                                     onclick="window.location.href='{{ route('meal.details', ['meal' => $meal->id]) }}'">
                                                    <img src="{{ asset('storage/meal-imgs/' . $meal->image_path) }}"
                                                         class="card-img-top meal-image" alt="{{ $meal->name }}">
                                                    <div class="card-body text-center">
                                                        <h5 class="card-title">{{ $meal->name }}</h5>
                                                        <p class="card-text">{{ $meal->description }}</p>
                                                        <p class="card-text"><strong>${{ number_format($meal->price, 2) }}</strong></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="blur-box"></div>
                                </div>
                                <div>
                                    <h6 class="card-text text-center">{{ $restaurant->city }} {{ $restaurant->street }} {{ $restaurant->address }}</h6>
                                </div>
                                <hr>
                                <h5 class="text-center">{{ $restaurant->delivery_price }}$ <i class="fas fa-shipping-fast"></i></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <div class="flex justify-center">
            @if ($restaurants->previousPageUrl())
                <a href="{{ $restaurants->previousPageUrl() }}" class="btn btn-primary">Previous</a>
            @endif
            @if ($restaurants->nextPageUrl())
                <a href="{{ $restaurants->nextPageUrl() }}" class="btn btn-primary">Next</a>
            @endif
        </div>
    </div>

    <style>
        .horizontal-scroll-container {
            display: flex;
            overflow-x: hidden;
            padding: 10px 0;
        }

        .horizontal-scroll-container .card {
            flex: 0 0 auto;
            width: calc(25% - 10px);
            margin-right: 10px;
        }

        .card .meal-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .blur-box {
            background-color: var(--3-color);
            width: 120px;
            height: 330px;
            filter: blur(5px);
            z-index: 100;
            display: none;
        }

        @media (max-width: 1200px) {
            .horizontal-scroll-container .card {
                width: calc(33.33% - 10px);
            }
        }

        @media (max-width: 992px) {
            .horizontal-scroll-container .card {
                width: calc(50% - 10px);
            }
        }

        @media (max-width: 768px) {
            .horizontal-scroll-container .card {
                width: calc(100% - 10px);
            }
        }
    </style>

    <script>
        function randomSpeed() {
            return Math.floor(Math.random() * 30) + 30;
        }

        function autoScroll(element) {
            const container = element.closest('.horizontal-scroll-container');
            const containerScrollWidth = container.scrollWidth;
            const containerWidth = container.offsetWidth;

            if (containerScrollWidth > containerWidth) {
                let scrollPosition = 0;

                setInterval(() => {
                    if (scrollPosition <= containerScrollWidth - containerWidth) {
                        scrollPosition += 1;
                        container.scrollLeft = scrollPosition;
                    } else {
                        scrollPosition = 0;
                        container.scrollLeft = 0;
                    }
                }, randomSpeed());
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            const scrollContainers = document.querySelectorAll('.horizontal-scroll-container');
            scrollContainers.forEach(container => {
                autoScroll(container);
            });
        });
    </script>
@endsection
