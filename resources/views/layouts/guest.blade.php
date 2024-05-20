<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased login-container"
      style="background-image: url('{{ asset('storage/meal-imgs/' . $mealImage) }}');">
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 overlay">
    <div>
        <a href="/">
            <img src="{{ asset('favicon.png') }}" alt="Logo" class="app-logo">
        </a>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg login-form">
        {{ $slot }}
    </div>
</div>
<style>
    .login-container {
        position: relative;
        height: 100vh;
        width: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .login-container::before {
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
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .app-logo {
        width: 300px;
        height: auto;
        transition: filter 0.9s ease;
        filter: drop-shadow(0 0 10px white);
        margin: 20px;
    }

     .login-form{
         background-color: rgba(255, 255, 255, 0.48);
         color: black;
         margin: 20px;
         overflow-y: auto;
     }

    @media (max-width: 650px) {
        .login-form{
            width: 400px;
            border-radius: 20px;
        }
    }
</style>
</body>
</html>
