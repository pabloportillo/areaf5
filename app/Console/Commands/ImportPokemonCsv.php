<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportPokemonCsv extends Command
{
    protected $signature = 'import:pokemon-csv';

    protected $description = 'Importa datos de Pokémon desde un archivo CSV a la tabla Pokédex.';

    public function handle()
    {
        $filePath = base_path('storage/app/pokemon.csv');

        $this->info('Iniciando la importación del archivo CSV...');

        if (!file_exists($filePath)) {
            $this->error('El archivo CSV no se encuentra en la ruta especificada.');
            return;
        }

        $file = fopen($filePath, 'r');

        // Omitir la primera línea (encabezado)
        fgetcsv($file);

        $pokemonData = [];

        while (($data = fgetcsv($file)) !== FALSE) {
            $pokemonData[] = [
                'name' => $data[1],
                'type_1' => $data[2],
                'type_2' => $data[3],
                'total' => $data[4],
                'hp' => $data[5],
                'attack' => $data[6],
                'defense' => $data[7],
                'sp_atk' => $data[8],
                'sp_def' => $data[9],
                'speed' => $data[10],
                'generation' => $data[11],
                'legendary' => $data[12] === 'TRUE',
            ];
        }

        fclose($file);

        DB::table('pokedex')->insert($pokemonData);

        $this->info('¡Importación de Pokémon completada!');
        $this->info('Se importaron ' . count($pokemonData) . ' Pokémon.');
    }
}
