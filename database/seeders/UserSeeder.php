<?php

namespace Database\Seeders;

use App\Models\User; 
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                // 'password' => bcrypt('password'),
            ]);
        }
    }
}
