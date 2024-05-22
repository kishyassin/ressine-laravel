<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetaillesPaiement extends Model
{
    protected $primaryKey = 'idMp';

    public function paiement()
    {
        return $this->belongsTo(Paiement::class, 'idPaiement', 'idPaiement');
    }
}
