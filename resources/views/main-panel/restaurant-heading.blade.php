<div class="d-flex align-items-center justify-between">
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
    <div>
        @for ($i = 0; $i < floor($restaurant->ratings); $i++)
            <i class="fas fa-star"></i>
        @endfor
        @if ($restaurant->ratings - floor($restaurant->ratings) >= 0.5)
            <i class="fas fa-star-half-alt"></i>
        @endif
    </div>
</div>
