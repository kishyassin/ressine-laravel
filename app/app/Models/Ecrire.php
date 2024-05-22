<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ecrire extends Model
{
    protected $primaryKey = null;
    public $incrementing = false;

    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idClient');
    }

    public function testimonial()
    {
        return $this->belongsTo(Testimoniale::class, 'idTestimoniale', 'idTestimoniale');
    }

    public function orderDate()
    {
        return $this->belongsTo(OrderDate::class, 'idDate', 'idDate');
    }
}
