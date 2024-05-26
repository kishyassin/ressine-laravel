<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'idClient';

    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'idClient', 'idClient');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idClient', 'idClient');
    }
    public function etoiles()
    {
        return $this->hasMany(Etoile::class, 'idClient', 'idClient');
    }

    public function testimonials()
    {
        return $this->hasMany(Testimoniale::class, 'idClient', 'idClient');
    }

    public function reservations()
    {
        return $this->hasMany(Reserver::class, 'idClient', 'idClient');
    }
}
