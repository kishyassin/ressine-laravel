<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Commande Model
 *
 * Represents an order in the system.
 */
class Commande extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'commandes';

    // Specify the primary key for the model
    protected $primaryKey = 'idCommande';

    // Indicates if the model should be timestamped
    public $timestamps = true;

    /**
     * Get the order date associated with the commande.
     *
     * This defines a many-to-one relationship between commandes and order dates.
     * Each commande belongs to one order date.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderDate()
    {
        return $this->belongsTo(OrderDate::class, 'idDate', 'idDate');
    }

    /**
     * Get the invoice associated with the commande.
     *
     * This defines a many-to-one relationship between commandes and factures.
     * Each commande belongs to one facture.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function facture()
    {
        return $this->belongsTo(Facture::class, 'numeroFacture', 'numeroFacture');
    }

    /**
     * Get the delivery person associated with the commande.
     *
     * This defines a many-to-one relationship between commandes and livreurs.
     * Each commande belongs to one livreur.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    /**
     * Get the client associated with the commande.
     *
     * This defines a many-to-one relationship between commandes and clients.
     * Each commande belongs to one client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */


    /**
     * Get the dish associated with the commande.
     *
     * This defines a many-to-one relationship between commandes and plats.
     * Each commande belongs to one plat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plat()
    {
        return $this->belongsTo(Plat::class, 'idPlat', 'idPlat');
    }
}