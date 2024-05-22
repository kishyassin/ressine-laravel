<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livreur extends Model
{
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idLivreur', 'idLivreur');
    }
}
