<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Categorie Model
 *
 * Represents a category in the system.
 */
class Categorie extends Model
{
    // Specify the table associated with the model.
    protected $table = 'categories';

    // Specify the primary key for the model.
    protected $primaryKey = 'idCategorie';

    // Indicates if the model should be timestamped.
    public $timestamps = true;

    /**
     * Get the plats for the category.
     *
     * This defines a one-to-many relationship between categories and plats.
     * Each category can have multiple plats.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plats()
    {
        return $this->hasMany(Plat::class, 'idCategorie', 'idCategorie');
    }
}

