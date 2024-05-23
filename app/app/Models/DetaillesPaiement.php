<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetaillesPaiement extends Model
{
    use HasFactory;

    protected $primaryKey = 'idMp';

    public function paiement()
    {
        return $this->belongsTo(Paiement::class, 'idPaiement', 'idPaiement');
    }
}
