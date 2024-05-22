<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $primaryKey = 'idIngredient';

    public function plats()
    {
        return $this->belongsToMany(Plat::class, 'composers', 'idIngredient', 'idPlat')
            ->withTimestamps();
    }
}

