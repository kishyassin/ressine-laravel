<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;
    protected $primaryKey = 'idClient';

    public function testimoniales()
    {
        return $this->belongsToMany(Testimoniale::class, 'ecrires', 'idClient', 'idTestimoniale')
                    ->withPivot('idDate')
                    ->withTimestamps();
    }

    public function orderDates()
    {
        return $this->hasManyThrough(
            OrderDate::class, 
            Ecrire::class, 
            'idClient',     // Foreign key on Ecrire table
            'idDate',       // Foreign key on OrderDate table
            'idClient',     // Local key on Client table
            'idDate'        // Local key on Ecrire table
        );
    }
}