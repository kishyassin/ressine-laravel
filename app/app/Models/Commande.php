<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;
    protected $primaryKey = 'idCommande';

    public function orderDate()
    {
        return $this->belongsTo(OrderDate::class, 'idDate', 'idDate');
    }

    public function facture()
    {
        return $this->belongsTo(Facture::class, 'numeroFacture', 'numeroFacture');
    }

    public function livreur()
    {
        return $this->belongsTo(Livreur::class, 'idLivreur', 'idLivreur');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idClient');
    }

    public function plat()
    {
        return $this->belongsTo(Plat::class, 'idPlat', 'idPlat');
    }
}
