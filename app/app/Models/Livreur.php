<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Livreur Model
 *
 * Represents a delivery person.
 */
class Livreur extends Model
{
    use HasFactory;

    // Specify the primary key for the model
    protected $primaryKey = 'idLivreur';

    /**
     * Get the orders assigned to this delivery person.
     *
     * This defines a one-to-many relationship between livreurs and commandes.
     * Each livreur may have multiple commandes assigned to them.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idLivreur', 'idLivreur');
    }
}
