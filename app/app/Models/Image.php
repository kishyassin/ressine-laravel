<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Image Model
 *
 * Represents an image associated with a dish (plat).
 */
class Image extends Model
{
    use HasFactory;

    // Specify the primary key for the model
    protected $primaryKey = 'idImage';

    /**
     * Get the dish associated with the image.
     *
     * This defines a many-to-one relationship between images and plats.
     * Each image belongs to one plat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plat()
    {
        return $this->belongsTo(Plat::class, 'idPlat', 'idPlat');
    }
}
