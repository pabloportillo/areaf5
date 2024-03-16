<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potion extends Item
{
    use HasFactory;

    public function type(): string
    {
        return 'potion';
    }
}

