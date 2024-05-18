<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $cart = session('cart', []);
            $cartCount = 0;

            foreach ($cart as $restaurantId => $meals) {
                foreach ($meals as $meal) {
                    $cartCount += $meal['quantity'];
                }
            }

            $view->with('cartCount', $cartCount);
        });
    }
}
