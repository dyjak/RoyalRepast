<div class="home-container" style="background-image: url('{{ asset('storage/meal-imgs/' . $mealImage) }}');">
    <div class="overlay">
        <div class="content d-flex flex-col flex">
            {{--            <div class="shrink-0 flex items-center m-11">--}}
            {{--                <a href="{{ route('restaurants.index') }}">--}}
            {{--                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800 app-logo"/>--}}
            {{--                </a>--}}
            {{--            </div>--}}
            <div class="row">
                <img src="{{ asset('favicon.png') }}" alt="App Logo" class="app-logo mb-4">
            </div>
            <div class="row">
                @guest
                    <a href="{{ route('login') }}" class="btn btn-primary btn-lg mt-3">Login</a>
                @else
                    <p class="mb-3">Logged as: {{ Auth::user()->name }}</p>
                    <a href="{{ route('logout') }}" class="btn btn-secondary btn-lg mb-3"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="{{ route('profile.show') }}" class="btn btn-info btn-lg mb-3">Your profile</a>
                @endguest
                <a href="{{ route('restaurants.index') }}" class="btn btn-success btn-lg">Check for restaurants</a>
            </div>
            <div class="row">
            </div>
        </div>
    </div>
</div>
{{--@extends('layouts.more-styles')--}}

<style>
    .row {
        display: flex;
        flex-direction: row;
    }

    .home-container {
        position: relative;
        height: 100%;
        width: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .home-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: inherit;
        filter: blur(10px);
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1;
    }

    .row {
        text-align: center;
        color: white;
        z-index: 2;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .app-logo {
        max-width: 500px;
        margin-bottom: 20px;
        filter: drop-shadow(0 0 10px white);
    }

    .btn {
        padding: 20px;
        font-size: 18px;
        margin: 10px;
        text-decoration: none;
        color: white;
        width: 400px;
        border: 2px solid white;
        background-color: rgba(0, 0, 0, 0.84);
        filter: drop-shadow(0 0 10px white);
        border-radius: 100px;
        transition-duration: 2s;
        letter-spacing: 7px;
    }

    .btn:hover {
        border: 2px solid white;
        background-color: rgba(255, 255, 255, 0.48);
        color: black;
        margin: 10px;
        width: 700px;
        letter-spacing: 25px;
        filter: drop-shadow(11px 20px 40px white);
    }

    @media (max-width: 768px) {
        .overlay {
            flex-direction: column;
        }

        .btn {
            border: 2px solid rgb(255, 255, 255);
            font-size: 16px;
            padding: 15px;
            letter-spacing: 7px;
            width: 320px;
        }

        .btn:hover {
            border: 2px solid rgb(255, 255, 255);
            background-color: rgba(255, 255, 255, 0.65);
            color: black;
            width: 400px;
            letter-spacing: 10px;
            filter: drop-shadow(11px 20px 40px white);
        }

        .app-logo {
            max-width: 300px;
        }
    }

    @media (max-width: 576px) {
        .btn {
            border: 2px solid rgb(255, 255, 255);
            width: 280px;
            letter-spacing: 5px;
        }

        .btn:hover {
            border: 2px solid rgb(255, 255, 255);
            background-color: rgba(255, 255, 255, 0.87);
            color: black;
            width: 350px;
            letter-spacing: 7px;
            filter: drop-shadow(11px 20px 40px white);
        }

        .content {
            padding: 20px;
        }

        .app-logo {
            max-width: 250px;
        }
    }
</style>


