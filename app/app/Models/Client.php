<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $primaryKey = 'idClient';

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idClient', 'idClient');
    }

    public function testimoniales()
    {
        return $this->belongsToMany(Testimoniale::class, 'ecrires', 'idClient', 'idTestimoniale')
            ->withPivot('idDate')
            ->withTimestamps();
    }
}
