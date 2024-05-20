<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Meal;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //BURGERS r1
        $burgerWords = ['Delicious', 'Juicy', 'Tasty', 'Grilled', 'Gourmet', 'Savory', 'Mouthwatering', 'Cheesy', 'Crispy', 'Captain', 'Chef', 'Classic', 'Ultimate', 'Premium', 'Signature', 'Special'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $burgerWords[array_rand($burgerWords)];
            $word2 = $burgerWords[array_rand($burgerWords)];
            $burgerName = "$word1 $word2 Burger";
            Meal::create([
                'restaurant_id' => 1,
                'category_id' => rand(1, 6),
                'name' => $burgerName,
                'price' => rand(5, 30),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'beef 400g, bacon, salad, cheddar, yummy sauce',
                'description2' => 'Really good burger. Recommended by Juan Al Lee - the master of salad chopping in China.',
            ]);
        }


        //FINE FOOD r2
        $fineFoodWords = ['Exquisite', 'Gourmet', 'Elegant', 'Luxurious', 'Artisan', 'Succulent', 'Divine', 'Opulent', 'Fancy', 'Premium', 'Haute', 'Sumptuous', 'Decadent', 'Chic', 'Stylish'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = 'La '.$fineFoodWords[array_rand($fineFoodWords)];
            $word2 = $fineFoodWords[array_rand($fineFoodWords)];

            $fineFoodName = "$word1 $word2";
            Meal::create([
                'restaurant_id' => 2,
                'category_id' => rand(1, 6),
                'name' => $fineFoodName,
                'price' => rand(20, 100),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Finest ingredients, expertly crafted into an exquisite dish.',
                'description2' => 'Indulge in the luxurious flavors of our premium fine food. A culinary experience like no other.',
            ]);
        }

        //CASUAL DINING r3
        $casualDiningWords = ['Homestyle', 'Comfort', 'Cozy', 'Relaxed', 'Family', 'Friendly', 'Hearty', 'Wholesome', 'Classic', 'Traditional', 'Nostalgic', 'Charming', 'Simple', 'Warm', 'Inviting'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $casualDiningWords[array_rand($casualDiningWords)];
            $word2 = $casualDiningWords[array_rand($casualDiningWords)];
            $casualDiningName = "$word1 $word2";
            Meal::create([
                'restaurant_id' => 3,
                'category_id' => rand(1, 6),
                'name' => $casualDiningName,
                'price' => rand(10, 50),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Comforting and delicious, just like home-cooked meals.',
                'description2' => 'Experience the warmth and flavor of our classic casual dining dishes. Perfect for a relaxed meal with friends and family.',
            ]);
        }


        //BAR r4
        $barWords = ['Craft', 'Artisan', 'Signature', 'Mixology', 'Cocktail', 'Classic', 'Local', 'Gourmet', 'Premium', 'Special', 'Unique', 'Exclusive', 'Trendy', 'Hip', 'Chic'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $barWords[array_rand($barWords)];
            $word2 = $barWords[array_rand($barWords)];
            $mealName = "$word1 $word2";
            Meal::create([
                'restaurant_id' => 4,
                'category_id' => rand(1, 6),
                'name' => $mealName,
                'price' => rand(8, 20),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Indulge in our exquisite bar creations, expertly crafted by our mixologists.',
                'description2' => 'Experience the vibrant atmosphere of our bar while savoring our unique and flavorful cocktails.',
            ]);
        }

        //PUB r5
        $pubWords = ['Traditional', 'Homemade', 'Hearty', 'British', 'Ale', 'Stout', 'Cider', 'Pub Grub', 'Classic', 'Savory', 'Wholesome', 'Comfort', 'Roasted', 'Irish', 'Rustic'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $pubWords[array_rand($pubWords)];
            $word2 = $pubWords[array_rand($pubWords)];
            $mealName = "$word1 $word2";
            Meal::create([
                'restaurant_id' => 5,
                'category_id' => rand(1, 6),
                'name' => $mealName,
                'price' => rand(10, 25),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Enjoy our pub classics and seasonal favorites in a cozy and relaxed atmosphere.',
                'description2' => 'Treat yourself to a pint of our finest beer alongside our hearty and satisfying pub dishes.',
            ]);
        }

        //FOODTRUCK r6
        $foodTruckWords = ['Street', 'Urban', 'Gourmet', 'Fusion', 'Global', 'Authentic', 'Handcrafted', 'Spicy', 'Tasty', 'Vibrant', 'Exotic', 'Creative', 'Adventurous'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $foodTruckWords[array_rand($foodTruckWords)];
            $word2 = $foodTruckWords[array_rand($foodTruckWords)];
            $mealName = "Food Truck - $word1 $word2 Special";
            Meal::create([
                'restaurant_id' => 6,
                'category_id' => rand(1, 6),
                'name' => $mealName,
                'price' => rand(5, 15),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Experience the taste of the streets with our diverse and flavorful food truck offerings.',
                'description2' => 'Our food truck specials are crafted with fresh and quality ingredients to satisfy your cravings on the go.',
            ]);
        }

        //BURGERS r7
        $burgerWords = ['Delicious', 'Juicy', 'Tasty', 'Grilled', 'Gourmet', 'Savory', 'Mouthwatering', 'Cheesy', 'Crispy', 'Captain', 'Chef', 'Classic', 'Ultimate', 'Premium', 'Signature', 'Special'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $burgerWords[array_rand($burgerWords)];
            $word2 = $burgerWords[array_rand($burgerWords)];
            $burgerName = "Burger $word1 - $word2";
            Meal::create([
                'restaurant_id' => 7,
                'category_id' => rand(1, 6),
                'name' => $burgerName,
                'price' => rand(5, 30),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'beef 400g, bacon, salad, cheddar, yummy sauce',
                'description2' => 'Really good burger. Recommended by Juan Al Lee - the master of salad chopping in China.',
            ]);
        }


        //FINE FOOD r8
        $fineFoodWords = ['Exquisite', 'Gourmet', 'Elegant', 'Luxurious', 'Artisan', 'Succulent', 'Divine', 'Opulent', 'Fancy', 'Premium', 'Haute', 'Sumptuous', 'Decadent', 'Chic', 'Stylish'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $fineFoodWords[array_rand($fineFoodWords)];
            $word2 = $fineFoodWords[array_rand($fineFoodWords)];

            $fineFoodName = "$word1 $word2";
            Meal::create([
                'restaurant_id' => 8,
                'category_id' => rand(1, 6),
                'name' => $fineFoodName,
                'price' => rand(20, 100),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Finest ingredients, expertly crafted into an exquisite dish.',
                'description2' => 'Indulge in the luxurious flavors of our premium fine food. A culinary experience like no other.',
            ]);
        }

        //CASUAL DINING r9
        $casualDiningWords = ['Homestyle', 'Comfort', 'Cozy', 'Relaxed', 'Family', 'Friendly', 'Hearty', 'Wholesome', 'Classic', 'Traditional', 'Nostalgic', 'Charming', 'Simple', 'Warm', 'Inviting'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $casualDiningWords[array_rand($casualDiningWords)];
            $word2 = $casualDiningWords[array_rand($casualDiningWords)];
            $casualDiningName = "$word1 $word2";
            Meal::create([
                'restaurant_id' => 9,
                'category_id' => rand(1, 6),
                'name' => $casualDiningName,
                'price' => rand(10, 50),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Comforting and delicious, just like home-cooked meals.',
                'description2' => 'Experience the warmth and flavor of our classic casual dining dishes. Perfect for a relaxed meal with friends and family.',
            ]);
        }


        //BAR r10
        $barWords = ['Craft', 'Artisan', 'Signature', 'Mixology', 'Cocktail', 'Classic', 'Local', 'Gourmet', 'Premium', 'Special', 'Unique', 'Exclusive', 'Trendy', 'Hip', 'Chic'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $barWords[array_rand($barWords)];
            $word2 = $barWords[array_rand($barWords)];
            $mealName = "$word1 $word2";
            Meal::create([
                'restaurant_id' => 10,
                'category_id' => rand(1, 6),
                'name' => $mealName,
                'price' => rand(8, 20),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Indulge in our exquisite bar creations, expertly crafted by our mixologists.',
                'description2' => 'Experience the vibrant atmosphere of our bar while savoring our unique and flavorful cocktails.',
            ]);
        }

        //PUB r12
        $pubWords = ['Traditional', 'Homemade', 'Hearty', 'British', 'Ale', 'Stout', 'Cider', 'Pub Grub', 'Classic', 'Savory', 'Wholesome', 'Comfort', 'Roasted', 'Irish', 'Rustic'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $pubWords[array_rand($pubWords)];
            $word2 = $pubWords[array_rand($pubWords)];
            $mealName = "$word1 $word2";
            Meal::create([
                'restaurant_id' => 10,
                'category_id' => rand(1, 6),
                'name' => $mealName,
                'price' => rand(10, 25),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Enjoy our pub classics and seasonal favorites in a cozy and relaxed atmosphere.',
                'description2' => 'Treat yourself to a pint of our finest beer alongside our hearty and satisfying pub dishes.',
            ]);
        }

        //FOODTRUCK r11
        $foodTruckWords = ['Street', 'Urban', 'Gourmet', 'Fusion', 'Global', 'Authentic', 'Handcrafted', 'Spicy', 'Tasty', 'Vibrant', 'Exotic', 'Creative', 'Adventurous'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $foodTruckWords[array_rand($foodTruckWords)];
            $word2 = $foodTruckWords[array_rand($foodTruckWords)];
            $mealName = "$word1 $word2 Special";
            Meal::create([
                'restaurant_id' => 11,
                'category_id' => rand(1, 6),
                'name' => $mealName,
                'price' => rand(5, 15),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Experience the taste of the streets with our diverse and flavorful food truck offerings.',
                'description2' => 'Our food truck specials are crafted with fresh and quality ingredients to satisfy your cravings on the go.',
            ]);
        }

        //BURGERS r12
        $burgerWords = ['Delicious', 'Juicy', 'Tasty', 'Grilled', 'Gourmet', 'Savory', 'Mouthwatering', 'Cheesy', 'Crispy', 'Captain', 'Chef', 'Classic', 'Ultimate', 'Premium', 'Signature', 'Special'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $burgerWords[array_rand($burgerWords)];
            $word2 = $burgerWords[array_rand($burgerWords)];
            $burgerName = "$word1 $word2 Burger";
            Meal::create([
                'restaurant_id' => 12,
                'category_id' => rand(1, 6),
                'name' => $burgerName,
                'price' => rand(5, 30),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'beef 400g, bacon, salad, cheddar, yummy sauce',
                'description2' => 'Really good burger. Recommended by Juan Al Lee - the master of salad chopping in China.',
            ]);
        }


        //FINE FOOD r13
        $fineFoodWords = ['Exquisite', 'Gourmet', 'Elegant', 'Luxurious', 'Artisan', 'Succulent', 'Divine', 'Opulent', 'Fancy', 'Premium', 'Haute', 'Sumptuous', 'Decadent', 'Chic', 'Stylish'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = 'La '.$fineFoodWords[array_rand($fineFoodWords)];
            $word2 = $fineFoodWords[array_rand($fineFoodWords)];

            $fineFoodName = "$word1 $word2";
            Meal::create([
                'restaurant_id' => 13,
                'category_id' => rand(1, 6),
                'name' => $fineFoodName,
                'price' => rand(20, 100),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Finest ingredients, expertly crafted into an exquisite dish.',
                'description2' => 'Indulge in the luxurious flavors of our premium fine food. A culinary experience like no other.',
            ]);
        }

        //CASUAL DINING r14
        $casualDiningWords = ['Homestyle', 'Comfort', 'Cozy', 'Relaxed', 'Family', 'Friendly', 'Hearty', 'Wholesome', 'Classic', 'Traditional', 'Nostalgic', 'Charming', 'Simple', 'Warm', 'Inviting'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $casualDiningWords[array_rand($casualDiningWords)];
            $word2 = $casualDiningWords[array_rand($casualDiningWords)];
            $casualDiningName = "$word1 $word2";
            Meal::create([
                'restaurant_id' => 14,
                'category_id' => rand(1, 6),
                'name' => $casualDiningName,
                'price' => rand(10, 50),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Comforting and delicious, just like home-cooked meals.',
                'description2' => 'Experience the warmth and flavor of our classic casual dining dishes. Perfect for a relaxed meal with friends and family.',
            ]);
        }


        //BAR r15
        $barWords = ['Craft', 'Artisan', 'Signature', 'Mixology', 'Cocktail', 'Classic', 'Local', 'Gourmet', 'Premium', 'Special', 'Unique', 'Exclusive', 'Trendy', 'Hip', 'Chic'];
        for ($i = 1; $i <= 12; $i++) {
            $word1 = $barWords[array_rand($barWords)];
            $word2 = $barWords[array_rand($barWords)];
            $mealName = "$word1 $word2";
            Meal::create([
                'restaurant_id' => 15,
                'category_id' => rand(1, 6),
                'name' => $mealName,
                'price' => rand(8, 20),
                'image_path' => strtolower('food_img') . '_' . rand(1, 75) . '.jpg',
                'description' => 'Indulge in our exquisite bar creations, expertly crafted by our mixologists.',
                'description2' => 'Experience the vibrant atmosphere of our bar while savoring our unique and flavorful cocktails.',
            ]);
        }
    }

}
