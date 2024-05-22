<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function plats()
    {
        return $this->belongsToMany(Plat::class, 'composers', 'idIngredient', 'idPlat')
            ->withTimestamps();
    }
}

