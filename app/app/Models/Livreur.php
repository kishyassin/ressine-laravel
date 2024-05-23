<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livreur extends Model
{
    use HasFactory;

    protected $primaryKey = 'idLivreur';

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idLivreur', 'idLivreur');
    }
}
