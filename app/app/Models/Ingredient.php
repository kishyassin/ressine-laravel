<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
    use HasFactory;

    protected $primaryKey = 'idIngredient';

    public function composer()
    {
        return $this->hasMany(Composer::class, 'idIngredient', 'idIngredient');
    }
}

