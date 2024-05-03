<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Michał',
            'surname' => 'Dyjak',
            'permission' => 'administrator',
            'city' => 'Rzeszow',
            'postal_code' => '99999',
            'street' => 'Nieistotna',
            'address' => '123',
            'phone' => '123456789',
            'email' => 'md125114@stud.ur.edu.pl',
            'password' => Hash::make('admin'),
        ]);
        User::create([
            'name' => 'John',
            'surname' => 'Doe',
            'permission' => 'user',
            'city' => 'New York',
            'postal_code' => '10001',
            'street' => 'Main Street',
            'address' => '123',
            'phone' => '123456789',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Jane',
            'surname' => 'Doe',
            'permission' => 'user',
            'city' => 'Los Angeles',
            'postal_code' => '90001',
            'street' => 'Broadway',
            'address' => '456',
            'phone' => '987654321',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Michael',
            'surname' => 'Smith',
            'permission' => 'user',
            'city' => 'Chicago',
            'postal_code' => '60601',
            'street' => 'Michigan Avenue',
            'address' => '789',
            'phone' => '111222333',
            'email' => 'michael@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Emily',
            'surname' => 'Johnson',
            'permission' => 'user',
            'city' => 'Houston',
            'postal_code' => '77001',
            'street' => 'Main Street',
            'address' => '101',
            'phone' => '444555666',
            'email' => 'emily@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Christopher',
            'surname' => 'Brown',
            'permission' => 'user',
            'city' => 'Philadelphia',
            'postal_code' => '19101',
            'street' => 'Market Street',
            'address' => '202',
            'phone' => '777888999',
            'email' => 'chris@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Jessica',
            'surname' => 'Williams',
            'permission' => 'user',
            'city' => 'Phoenix',
            'postal_code' => '85001',
            'street' => 'Central Avenue',
            'address' => '303',
            'phone' => '333222111',
            'email' => 'jessica@example.com',
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Daniel',
            'surname' => 'Jones',
            'permission' => 'user',
            'city' => 'San Antonio',
            'postal_code' => '78201',
            'street' => 'Alamo Street',
            'address' => '404',
            'phone' => '666777888',
            'email' => 'daniel@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
