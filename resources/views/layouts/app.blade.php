<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

{{--        BOOTSTRAP--}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')
            @include('layouts.carousel')
            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>

{{--    RESTAURANTS EXPAND AND COLLAPSE MEALS--}}
    <script>
        function toggleCollapse(panelId) {
            var panel = document.getElementById(panelId);
            if (panel.classList.contains('show')) {
                panel.classList.remove('show');
            } else {
                panel.classList.add('show');
            }
        }
    </script>

{{--RESTAURANT INDEX MEALS PARTICULAR CATEGORY--}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var mealCategories = document.querySelectorAll('.meal-category');
                mealCategories.forEach(function(category, index) {
                    if (index !== 0) {
                        category.style.display = 'none';
                    }
                });

                var categoryButtons = document.querySelectorAll('.category-btn');
                categoryButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        var categoryId = button.dataset.category;
                        mealCategories.forEach(function(category) {
                            category.style.display = 'none';
                        });
                        document.getElementById('category' + categoryId).style.display = 'block';
                    });
                });
            });
        </script>

    </body>
</html>
