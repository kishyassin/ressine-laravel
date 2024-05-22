<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function plats()
    {
        return $this->hasMany(Plat::class, 'idCategorie', 'idCategorie');
    }
}

