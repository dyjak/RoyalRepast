<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Restaurant::create([
            'restaurant_category_id' => 1,
            'name' => 'Burger Kiss',
            'logo_path' => 'logo1',
            'ratings' => 4.5,
            'email' => 'burgerking@example.com',
            'phone' => '123456789',
            'city' => 'New York',
            'postal_code' => '10001',
            'street' => 'Main Street',
            'address' => '123',
            'delivery_price' => 0.0,
        ]);

        Restaurant::create([
            'restaurant_category_id' => 2,
            'name' => 'Le Bern',
            'logo_path' => 'logo2',
            'ratings' => 4.9,
            'email' => 'lebernardin@example.com',
            'phone' => '987654321',
            'city' => 'New York',
            'postal_code' => '10002',
            'street' => 'Broadway',
            'address' => '456',
        ]);

        Restaurant::create([
            'restaurant_category_id' => 3,
            'name' => 'Olives yum',
            'logo_path' => 'logo3',
            'ratings' => 4.2,
            'email' => 'olivegarden@example.com',
            'phone' => '111222333',
            'city' => 'Los Angeles',
            'postal_code' => '90001',
            'street' => 'Main Street',
            'address' => '789',
        ]);

        Restaurant::create([
            'restaurant_category_id' => 4,
            'name' => 'Starbugs',
            'logo_path' => 'logo4',
            'ratings' => 4.7,
            'email' => 'starbucks@example.com',
            'phone' => '555444333',
            'city' => 'Chicago',
            'postal_code' => '60601',
            'street' => 'Michigan Avenue',
            'address' => '101',
            'delivery_price' => 0.0,
        ]);

        Restaurant::create([
            'restaurant_category_id' => 5,
            'name' => 'CornPub',
            'logo_path' => 'logo5',
            'ratings' => 4.0,
            'email' => 'thepub@example.com',
            'phone' => '222333444',
            'city' => 'Houston',
            'postal_code' => '77001',
            'street' => 'Main Street',
            'address' => '202',
        ]);

        Restaurant::create([
            'restaurant_category_id' => 6,
            'name' => 'Taco Helligtrain',
            'logo_path' => 'logo6',
            'ratings' => 4.6,
            'email' => 'tacotruck@example.com',
            'phone' => '777888999',
            'city' => 'Philadelphia',
            'postal_code' => '19101',
            'street' => 'Market Street',
            'address' => '303',
            'delivery_price' => 0.0,
        ]);

        Restaurant::create([
            'restaurant_category_id' => 1,
            'name' => 'McGonnald\'s',
            'logo_path' => 'logo7',
            'ratings' => 4.3,
            'email' => 'mcdonalds@example.com',
            'phone' => '123123123',
            'city' => 'Los Angeles',
            'postal_code' => '90002',
            'street' => 'Sunset Boulevard',
            'address' => '456',
        ]);

        Restaurant::create([
            'restaurant_category_id' => 2,
            'name' => 'Per Melepele',
            'logo_path' => 'logo8',
            'ratings' => 4.8,
            'email' => 'perse@example.com',
            'phone' => '456456456',
            'city' => 'New York',
            'postal_code' => '10003',
            'street' => 'Broadway',
            'address' => '789',
            'delivery_price' => 0.0,
        ]);

        Restaurant::create([
            'restaurant_category_id' => 3,
            'name' => 'Willis',
            'logo_path' => 'logo9',
            'ratings' => 4.1,
            'email' => 'chilis@example.com',
            'phone' => '789789789',
            'city' => 'Chicago',
            'postal_code' => '60602',
            'street' => 'Michigan Avenue',
            'address' => '101',
        ]);

        Restaurant::create([
            'restaurant_category_id' => 4,
            'name' => 'Lurkin\' Donuts',
            'logo_path' => 'logo10',
            'ratings' => 4.0,
            'email' => 'dunkindonuts@example.com',
            'phone' => '321321321',
            'city' => 'Houston',
            'postal_code' => '77002',
            'street' => 'Main Street',
            'address' => '202',
            'delivery_price' => 0.0,
        ]);

        Restaurant::create([
            'restaurant_category_id' => 5,
            'name' => 'The Bar & Grill & Chill & EnjoyingParty',
            'logo_path' => 'logo11',
            'ratings' => 4.2,
            'email' => 'barandgrill@example.com',
            'phone' => '654654654',
            'city' => 'Philadelphia',
            'postal_code' => '19102',
            'street' => 'Market Street',
            'address' => '303',
        ]);

        Restaurant::create([
            'restaurant_category_id' => 6,
            'name' => 'Burger Crack (for weirdos)',
            'logo_path' => 'logo12',
            'ratings' => 4.5,
            'email' => 'burgertruck@example.com',
            'phone' => '987987987',
            'city' => 'San Francisco',
            'postal_code' => '94101',
            'street' => 'Mission Street',
            'address' => '404',
        ]);

        Restaurant::create([
            'restaurant_category_id' => 1,
            'name' => 'Dubway',
            'logo_path' => 'logo13',
            'ratings' => 4.1,
            'email' => 'subway@example.com',
            'phone' => '999999999',
            'city' => 'Los Angeles',
            'postal_code' => '90003',
            'street' => 'Sunset Boulevard',
            'address' => '456',
            'delivery_price' => 9.0,
        ]);

        Restaurant::create([
            'restaurant_category_id' => 2,
            'name' => 'Eleven Per Heaven with my bros',
            'logo_path' => 'logo14',
            'ratings' => 4.9,
            'email' => 'elevenmadisonpark@example.com',
            'phone' => '777777777',
            'city' => 'New York',
            'postal_code' => '10004',
            'street' => 'Broadway',
            'address' => '789',
        ]);

        Restaurant::create([
            'restaurant_category_id' => 3,
            'name' => 'BumpleWhipster',
            'logo_path' => 'logo15',
            'ratings' => 3.8,
            'email' => 'applebees@example.com',
            'phone' => '888888888',
            'city' => 'Chicago',
            'postal_code' => '60603',
            'street' => 'Michigan Avenue',
            'address' => '101',
            'delivery_price' => 0.0,
        ]);
    }
}
