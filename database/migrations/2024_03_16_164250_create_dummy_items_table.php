<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDummyItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('berries')->insert([
            'name' => 'Baya Ejemplo 1',
            'equippable_type' => null, // Valor nulo para equippable_type
            'equippable_id' => null, // Agregamos el campo equippable_id
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('potions')->insert([
            'name' => 'Poción Ejemplo 1',
            'equippable_type' => null, // Valor nulo para equippable_type
            'equippable_id' => null, // Agregamos el campo equippable_id
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Insertar al menos un usuario
        DB::table('users')->insert([
            'name' => 'Pablo',
            'email' => 'Pablo@gmail.com',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berries');
        Schema::dropIfExists('potions');
    }
}
