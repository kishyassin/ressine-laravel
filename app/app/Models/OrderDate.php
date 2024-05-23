<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDate extends Model
{
    use HasFactory;

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
