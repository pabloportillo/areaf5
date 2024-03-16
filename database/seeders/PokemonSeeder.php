<?php

namespace Database\Seeders;

use App\Models\Pokemon; 
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PokemonSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 20; $i++) {
            Pokemon::create([
                'name' => $faker->name, // Genera nombres aleatorios (necesitarás una lista de nombres de Pokémon)
                'nickname' => $faker->word,
                'user_id' => rand(1, 5), // Asignar a IDs de usuario aleatorios (asegúrate de que existan esos usuarios)
                'dummy' => false,
            ]);
        }
    }
}