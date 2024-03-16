<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class Item extends Model
{
    use HasFactory;

    public abstract function type(): string;

    public function equippable()
    {
        return $this->morphTo();
    }
}
