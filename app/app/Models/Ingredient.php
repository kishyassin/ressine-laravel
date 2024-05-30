<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Ingredient Model
 *
 * Represents an ingredient used in dishes.
 */
class Ingredient extends Model
{
    use HasFactory;

    // Specify the primary key for the model
    protected $primaryKey = 'idIngredient';

    /**
     * Get the dishes that use this ingredient.
     *
     * This defines a one-to-many relationship between ingredients and composers.
     * Each ingredient may be used in multiple composers (dishes).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function composer()
    {
        return $this->hasMany(Composer::class, 'idIngredient', 'idIngredient');
    }
}
