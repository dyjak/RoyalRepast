#!/bin/bash

php artisan migrate:fresh
php artisan db:seed --class="UserSeeder"
php artisan db:seed --class="RestaurantCategorySeeder"
php artisan db:seed --class="MealCategorySeeder"
php artisan db:seed --class="RestaurantSeeder"
php artisan db:seed --class="MealSeeder"
php artisan db:seed --class="CourierSeeder"
php artisan db:seed --class="OrderSeeder"
php artisan db:seed --class="OrderElementSeeder"
