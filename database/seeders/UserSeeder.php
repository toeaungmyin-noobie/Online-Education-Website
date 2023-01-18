<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Lucifer Burma',
            'email' => 'luciferburma@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('admin');
        User::create([
            'name' => 'Instructor',
            'email' => 'instructor@gmail.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('instructor');

        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->firstName(),
                'email' => $faker->email(),
                'password' => Hash::make('12345678'),

            ])->assignRole('user');
        };
    }
}
