<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pokedex', function (Blueprint $table) {
            $table->increments('id'); // Primary key
            $table->string('name'); 
            $table->string('type_1');
            $table->string('type_2')->nullable(); // Allow for single-type Pokemon
            $table->integer('total');
            $table->integer('hp');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('sp_atk');
            $table->integer('sp_def');
            $table->integer('speed');
            $table->integer('generation');
            $table->boolean('legendary');
            $table->boolean('captured')->nullable();
            $table->timestamps(); // created_at, updated_at fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('pokedex');
    }
};
