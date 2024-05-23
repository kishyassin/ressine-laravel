<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimoniale extends Model
{
    use HasFactory;

    protected $primaryKey = 'idTestimoniale';

    
    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idClient');
    }
}
