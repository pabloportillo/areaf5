<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokedex extends Model
{
    use HasFactory;
    
    protected $table = 'pokedex';

    // Define variables matching the expected structure of your Pokédex
    protected $fillable = [
        'name', 
        'type_1',
        'type_2',
        'total',
        'hp',
        'attack',
        'defense',
        'sp_atk',
        'sp_def',
        'speed',
        'generation',
        'legendary',
        'captured',
    ];

}
