<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDate extends Model
{
    public function factures()
    {
        return $this->hasMany(Facture::class, 'idDate', 'idDate');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idDate', 'idDate');
    }
}
