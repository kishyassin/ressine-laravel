<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Paiement Model
 *
 * Represents a payment made for an invoice.
 */
class Paiement extends Model
{
    use HasFactory;

    // Specify the primary key for the model
    protected $primaryKey = 'idPaiement';

    /**
     * Get the client who made the payment.
     *
     * This defines a many-to-one relationship between paiements and clients.
     * Each paiement belongs to one client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idClient');
    }

    /**
     * Get the invoice associated with the payment.
     *
     * This defines a many-to-one relationship between paiements and factures.
     * Each paiement belongs to one facture.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facture()
    {
        return $this->belongsTo(Facture::class, 'numeroFacture', 'numeroFacture');
    }

    /**
     * Get the detailed payments associated with this payment.
     *
     * This defines a one-to-many relationship between paiements and detailles paiements.
     * Each paiement may have multiple detailed payments associated with it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detaillesPaiements()
    {
        return $this->hasMany(DetaillesPaiement::class, 'idPaiement', 'idPaiement');
    }
}
