<?php

namespace Database\Factories;

use App\Models\Pokemon;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class PokemonFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name, // Genera nombres aleatorios (necesitarás una lista de nombres de Pokémon)
            'nickname' => $this->faker->word,
            'user_id' => rand(1, 5), // Asignar a IDs de usuario aleatorios (asegúrate de que existan esos usuarios)
            'dummy' => false,
        ];
    }
}
