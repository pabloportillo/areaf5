<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Berry;
use App\Models\Potion;
use App\Models\Item;

class Pokemon extends Model
{
    use HasFactory;

    protected $table = 'pokemon';

    protected $fillable = [
        'name',
        'nickname',
        'user_id',
        'dummy' ,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function equippedItem()
    // {
    //     // Define the condition to choose between Berry and Potion
    //     $isBerry = true; // Placeholder condition, replace with your actual logic
    
    //     // Determine the concrete subclass based on the condition
    //     $itemClass = $isBerry ? Berry::class : Potion::class;
    
    //     // Define the morphOne relationship with the chosen concrete subclass
    //     return $this->morphOne($itemClass, 'equippable')->withDefault();
    // }

    public function equippedItem()
    {
        // Define the condition to choose between Berry and Potion
        $isBerry = true; // Placeholder condition, replace with your actual logic
    
        // Determine the concrete subclass based on the condition
        $itemClass = $isBerry ? Berry::class : Potion::class;
    
        // Define the morphOne relationship with the chosen concrete subclass
        return $this->morphOne($itemClass, 'equippable')->withDefault();
    }

}
