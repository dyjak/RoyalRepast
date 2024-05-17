@php
    use App\Models\Meal;
@endphp

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Restaurants</h1>
        <div class="row">
            @foreach($restaurants as $restaurant)
                <div class="col-md-12 mb-4">
                    <div class="card">
                        <div class="card-header flex-row">
                            <a href="{{ route('restaurant.show', ['restaurant_id' => $restaurant->id]) }}"
                               class="text-decoration-none">
                                <div class="d-flex align-items-center justify-center">
                                    <div>
                                        <img src="{{ asset('storage/logo/' . $restaurant->logo_path . '.png') }}"
                                             alt="Restaurant Logo"
                                             style="width: 80px; height: 80px; margin-right: 10px;">
                                    </div>
                                    <div>
                                        <h3 class="card-text">{{ $restaurant->name }}</h3>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="card-body">
                            @php
                                $meals = Meal::where('restaurant_id', $restaurant->id)->inRandomOrder()->limit(10)->get();
                            @endphp
                            <div class="horizontal-scroll-container">
                                @foreach($meals as $meal)
                                    <div class="card h-100 card-second">
                                        <div class="clickable-card"
                                             onclick="window.location.href='{{ route('meal.details', ['meal' => $meal->id]) }}'">
                                            <img src="{{ asset('storage/meal-imgs/' . $meal->image_path) }}"
                                                 class="card-img-top meal-image" alt="{{ $meal->name }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $meal->name }}</h5>
                                                <p class="card-text">{{ $meal->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="collapse" id="mealPanel{{ $restaurant->id }}">
                            <div class="row">
                                @if($meals->isNotEmpty())
                                    @foreach($meals as $meal)
                                        <div class="col-md-4 mb-3">
                                            <div class="card h-100 card-second">
                                                <div class="clickable-card"
                                                     onclick="window.location.href='{{ route('meal.details', ['meal' => $meal->id]) }}'">
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



        @media (max-width: 1200px) {
            .horizontal-scroll-container .card {
                width: calc(33.33% - 10px); /* Show 3 cards in a row */
            }
        }

        @media (max-width: 992px) {
            .horizontal-scroll-container .card {
                width: calc(50% - 10px); /* Show 2 cards in a row */
            }
        }

        @media (max-width: 768px) {
            .horizontal-scroll-container .card {
                width: calc(100% - 10px); /* Show 1 card in a row */
            }
        }
    </style>


    <script>
        function randomSpeed(){return Math.floor(Math.random() * 30) + 30}
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

        // Wywołanie funkcji autoScroll dla wszystkich kontenerów po załadowaniu strony
        document.addEventListener('DOMContentLoaded', () => {
            const scrollContainers = document.querySelectorAll('.horizontal-scroll-container');
            scrollContainers.forEach(container => {
                autoScroll(container);
            });
        });
    </script>
    Po dodaniu tego skryptu, kontenery .horizontal-scroll-container będą automatycznie przewijane poziomo. Możesz dostosować prędkość przewijania zmieniając wartość zmiennej scrollSpeed w skrypcie.








@endsection
