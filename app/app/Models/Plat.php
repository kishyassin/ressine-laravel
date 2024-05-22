<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'idCategorie', 'idCategorie');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'composers', 'idPlat', 'idIngredient')
            ->withTimestamps();
    }
}
