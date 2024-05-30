<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * DetaillesPaiement Model
 *
 * Represents the details of a payment.
 */
class DetaillesPaiement extends Model
{
    use HasFactory;

    // Specify the primary key for the model
    protected $primaryKey = 'idMp';

    /**
     * Get the payment associated with the payment details.
     *
     * This defines a many-to-one relationship between payment details and payments.
     * Each payment detail belongs to one payment.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paiement()
    {
        return $this->belongsTo(Paiement::class, 'idPaiement', 'idPaiement');
    }
}
