<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDate extends Model
{
    protected $primaryKey = 'idDate';

    public function factures()
    {
        return $this->hasMany(Facture::class, 'idDate', 'idDate');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idDate', 'idDate');
    }
}
