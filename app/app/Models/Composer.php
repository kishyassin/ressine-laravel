<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Composer Model
 *
 * Represents the composition of ingredients in a dish.
 */
class Composer extends Model
{
    use HasFactory;

    // Disable auto-incrementing primary key
    protected $primaryKey = null;
    public $incrementing = false;

    /**
     * Get the dish associated with the composition.
     *
     * This defines a many-to-one relationship between composers and plats.
     * Each composer belongs to one plat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plat()
    {
        return $this->belongsTo(Plat::class, 'idPlat', 'idPlat');
    }

    /**
     * Get the ingredient associated with the composition.
     *
     * This defines a many-to-one relationship between composers and ingredients.
     * Each composer belongs to one ingredient.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class, 'idIngredient', 'idIngredient');
    }
}
