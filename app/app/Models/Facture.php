<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Facture Model
 *
 * Represents an invoice in the system.
 */
class Facture extends Model
{
    use HasFactory;

    // Specify the primary key for the model
    protected $primaryKey = 'numeroFacture';

    /**
     * Get the order date associated with the invoice.
     *
     * This defines a many-to-one relationship between factures and order dates.
     * Each facture belongs to one order date.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderDate()
    {
        return $this->belongsTo(OrderDate::class, 'idDate', 'idDate');
    }

    /**
     * Get the orders associated with the invoice.
     *
     * This defines a one-to-many relationship between factures and commandes.
     * Each facture may have multiple commandes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'numeroFacture', 'numeroFacture');
    }

    /**
     * Get the payments associated with the invoice.
     *
     * This defines a one-to-many relationship between factures and paiements.
     * Each facture may have multiple paiements.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'numeroFacture', 'numeroFacture');
    }
}
