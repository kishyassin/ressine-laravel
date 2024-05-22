<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    public function orderDate()
    {
        return $this->belongsTo(OrderDate::class, 'idDate', 'idDate');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'numeroFacture', 'numeroFacture');
    }
}
