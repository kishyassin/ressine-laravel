<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Commande extends Model
{
    use HasFactory;

    
    public function getTopThree()
    {
        return $this->select('idPlat', DB::raw('COUNT(idPlat) as nbCommande'))
            ->groupBy('idPlat')
            ->orderBy('nbCommande', 'DESC')
            ->limit(3)
            ->get();
    }
}
