<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berry extends Item
{
    use HasFactory;

    public function type(): string
    {
        return 'berry';
    }
}
