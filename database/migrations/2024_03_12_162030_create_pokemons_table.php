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
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('dummy')->default(0);
            $table->unsignedBigInteger('equippable_id')->nullable();
            $table->string('equippable_type')->nullable();
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Define un valor predeterminado para equippable_id
        DB::statement("ALTER TABLE pokemon ALTER COLUMN equippable_id SET DEFAULT 0");
    }

    /**
     * Reverse de migration.
     */
    public function down()
    {
        Schema::dropIfExists('pokemon');
    }
};
