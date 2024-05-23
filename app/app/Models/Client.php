<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'idClient';

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idClient', 'idClient');
    }

    public function testimoniales()
    {
        return $this->hasMany(Testimoniale::class, 'idClient', 'idClient');
    }

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'idClient', 'idClient');
    }
}
