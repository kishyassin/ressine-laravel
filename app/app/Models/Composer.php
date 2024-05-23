<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Composer extends Model
{
    use HasFactory;

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
