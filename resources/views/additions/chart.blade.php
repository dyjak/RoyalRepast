@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Restaurant Categories Chart</h1>
        <div style="max-width: 500px; margin: auto;">
            <canvas id="categoriesChart"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('categoriesChart').getContext('2d');
            const categories = @json($categories);

            const data = {
                labels: categories.map(category => category.name),
                datasets: [{
                    data: categories.map(category => category.restaurants_count),
                    backgroundColor: categories.map((category, index) => {
                        const colors = ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#F90140'];
                        return colors[index % colors.length];
                    })
                }]
            };

            const config = {
                type: 'pie',
                data: data
            };

            new Chart(ctx, config);
        });
    </script>
@endsection
