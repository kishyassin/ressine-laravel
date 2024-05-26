<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etoile extends Model
{
    use HasFactory;
    protected $primaryKey = null;
    public $incrementing = false;

    public function plat()
    {
        return $this->belongsTo(Plat::class, 'idPlat', 'idPlat');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idClient');
    }
}
