<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $primaryKey = 'idImage';


    public function plat()
    {
        return $this->belongsTo(Plat::class, 'idPlat', 'idPlat');
    }
}
