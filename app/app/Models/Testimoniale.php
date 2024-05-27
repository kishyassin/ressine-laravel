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
    public static function fourAcceptedTestimonials()
    {
        $testimonials = Testimoniale::with('client') // Eager load the client relationship
        ->where('etatTestimoniale', 1) // Condition for etatTestimoniale to be 1
        ->orderBy('created_at', 'desc') // Order by creation date (newest first)
        ->limit(4) // Limit to 4 testimonials
        ->get();
        return $testimonials;
    }
}
