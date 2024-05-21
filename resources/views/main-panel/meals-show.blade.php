@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="row g-0">
                <div class="col-md-6">
                    <a href="{{ route('restaurant.show', ['restaurant_id' => $meal->restaurant->id]) }}" class="text-decoration-none">
                        <div class="meal-image" style="background-image: url('{{ asset('storage/meal-imgs/' . $meal->image_path) }}');"></div>
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-center">
                            <div>
                                <a href="{{ route('restaurant.show', ['restaurant_id' => $meal->restaurant->id]) }}" class="text-decoration-none">
                                    <img src="{{ asset('storage/logo/' . $meal->restaurant->logo_path . '.png') }}" alt="Restaurant Logo" style="width: 100px; height: 100px; margin-right: 10px;">
                                </a>
                            </div>
                            <div>
                                <a href="{{ route('restaurant.show', ['restaurant_id' => $meal->restaurant->id]) }}" class="text-decoration-none">
                                    <h1 class="card-text" style="letter-spacing: 5px;">{{ $meal->restaurant->name }}</h1>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-center items-center">
                            <h1 class="card-title items-center">{{ $meal->name }}</h1>
                        </div>
                        <hr>
                        @php
                            $desc = explode(',', $meal->description);
                        @endphp
                        <list>
                            @foreach($desc as $d)
                                <h5>
                                    <ul><i class="fa-regular fa-circle-dot"></i> {{$d}}</ul>
                                </h5>
                            @endforeach
                        </list>
                        <h6 class="card-text">{{ $meal->description2 }}</h6>

                        <form action="{{ route('cart.add', $meal->id) }}" method="POST" class="mt-3 flex justify-center items-center">
                            @csrf
                            <div class="form-group m-0">
                                <input type="number" name="quantity" id="quantity" class="form-control mr-sm-2" value="1" min="1" style="font-size: xx-large; width:100px; border:2px solid black; text-align: center; padding:0;" oninput="calculatePrice()">
                            </div>
                            <button type="submit" class="btn btn-success mt-3" style="font-size: large; margin:15px;">
                                Add to Cart
                            </button>
                        </form>
                        <div class="d-flex justify-center text-right">
                            <h1 class="card-text text-right">$<span id="total-price">{{ number_format($meal->price, 2) }}</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>
        <div class="card-body">
            <!-- Restaurant Panel -->
            <div class="card mb-3">
                <div class="card-header">
                    More from <b>{{ $meal->restaurant->name }}</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($mealsFromSameRestaurant as $meal_i)
                            <div class="col-md-3 mb-3">
                                <div class="card h-100">
                                    <a href="{{ route('meal.details', ['meal' => $meal_i->id]) }}" class="text-decoration-none">
                                        <img src="{{ asset('storage/meal-imgs/' . $meal_i->image_path) }}" class="card-img-top" alt="{{ $meal_i->name }}">
                                    </a>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $meal_i->name }}</h5>
                                        <p class="card-text">{{ $meal_i->description }}</p>
                                        <p class="card-text"><strong>${{ number_format($meal_i->price, 2) }}</strong></p>
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
                    More <b>{{ $meal->category->name }}</b>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($mealsFromSameCategory as $meal_i)
                            <div class="col-md-3 mb-3">
                                <div class="card h-100">
                                    <a href="{{ route('meal.details', ['meal' => $meal_i->id]) }}" class="text-decoration-none">
                                        <img src="{{ asset('storage/meal-imgs/' . $meal_i->image_path) }}" class="card-img-top" alt="{{ $meal_i->name }}">
                                    </a>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $meal_i->name }}</h5>
                                        <p class="card-text">{{ $meal_i->description }}</p>
                                        <p class="card-text"><strong>${{ number_format($meal_i->price, 2) }}</strong></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function calculatePrice() {
            var quantity = document.getElementById('quantity').value;
            var price = {{ $meal->price }};
            var totalPrice = quantity * price;
            document.getElementById('total-price').innerText = totalPrice.toFixed(2);
        }
    </script>
@endsection

<style>
    .meal-image {
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        border-radius: .25rem .25rem 0 0;
    }

    @media (max-width: 768px) {
        .meal-image {
            height: 200px;
        }
    }
</style>
