<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoniale extends Model
{
    protected $primaryKey = 'idTestimoniale';

    public function clients()
    {
        return $this->belongsToMany(Client::class, 'ecrires', 'idTestimoniale', 'idClient')
            ->withPivot('idDate')
            ->withTimestamps();
    }
}
