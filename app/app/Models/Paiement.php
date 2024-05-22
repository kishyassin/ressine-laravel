<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    protected $primaryKey = 'idPaiement';

    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idClient');
    }

    public function facture()
    {
        return $this->belongsTo(Facture::class, 'numeroFacture', 'numeroFacture');
    }

    public function detaillesPaiements()
    {
        return $this->hasMany(DetaillesPaiement::class, 'idPaiement', 'idPaiement');
    }
}
