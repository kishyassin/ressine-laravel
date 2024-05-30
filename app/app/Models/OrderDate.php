<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * OrderDate Model
 *
 * Represents dates associated with orders or reservations.
 */
class OrderDate extends Model
{
    use HasFactory;

    // Specify the primary key for the model
    protected $primaryKey = 'idDate';

    /**
     * Get the invoices generated on this date.
     *
     * This defines a one-to-many relationship between order dates and factures.
     * Each order date may have multiple factures associated with it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function factures()
    {
        return $this->hasMany(Facture::class, 'idDate', 'idDate');
    }

    /**
     * Get the orders placed on this date.
     *
     * This defines a one-to-many relationship between order dates and commandes.
     * Each order date may have multiple commandes placed on it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idDate', 'idDate');
    }

    /**
     * Get the reservations made for this date.
     *
     * This defines a one-to-many relationship between order dates and reservations.
     * Each order date may have multiple reservations made for it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations()
    {
        return $this->hasMany(Reserver::class, 'idDate', 'idDate');
    }
}
