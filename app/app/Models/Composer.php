<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Composer extends Model
{
    
    protected $primaryKey = null;
    public $incrementing = false;

    public function plat()
    {
        return $this->belongsTo(Plat::class, 'idPlat', 'idPlat');
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'idIngredient', 'idIngredient');
    }
}
