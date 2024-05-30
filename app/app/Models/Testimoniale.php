<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Testimoniale Model
 *
 * Represents a testimonial provided by a client.
 */
class Testimoniale extends Model
{
    use HasFactory;

    // Specify the primary key for the model
    protected $primaryKey = 'idTestimoniale';

    /**
     * Get the client who provided the testimonial.
     *
     * This defines a many-to-one relationship between testimonials and clients.
     * Each testimonial belongs to one client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idClient');
    }

    /**
     * Retrieve four accepted testimonials with the client who wrote them.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function fourAcceptedTestimonials()
    {
        return static::where('etatTestimoniale', 1)->with('client')->take(4)->get();
    }
}
