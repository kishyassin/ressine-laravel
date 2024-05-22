<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoniale extends Model
{
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'ecrires', 'idTestimoniale', 'idClient')
            ->withPivot('idDate')
            ->withTimestamps();
    }
}
