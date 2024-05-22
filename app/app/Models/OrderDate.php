<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDate extends Model
{
    protected $primaryKey = 'idDate';

    public function factures()
    {
        return $this->hasMany(Facture::class, 'idDate', 'idDate');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idDate', 'idDate');
    }

    protected $table = 'Order_dates'; // Specifying the actual table name

    // Define any relationships as necessary, for example:
    public function testimoniales()
    {
        return $this->hasManyThrough(
            Testimoniale::class, 
            Ecrire::class, 
            'idDate',           // Foreign key on Ecrire table
            'idTestimoniale',   // Foreign key on Testimoniale table
            'idDate',           // Local key on OrderDate table
            'idTestimoniale'    // Local key on Ecrire table
        );
    }
}
