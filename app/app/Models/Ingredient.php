<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;

    protected $primaryKey = 'idIngredient';

    public function plats()
    {
        return $this->belongsToMany(Plat::class, 'composers', 'idIngredient', 'idPlat')
            ->withTimestamps();
    }
}

