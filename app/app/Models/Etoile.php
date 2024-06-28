<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Etoile Model
 *
 * Represents a rating given by a client to a dish.
 */
class Etoile extends Model
{
    use HasFactory;

    // Disable auto-incrementing primary key
    protected $primaryKey = null;
    public $incrementing = false;

    protected $fillable = ['idPlat', 'idClient', 'nombreEtoile'];
    /**
     * Get the dish associated with the rating.
     *
     * This defines a many-to-one relationship between etoiles and plats.
     * Each etoile belongs to one plat.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plat()
    {
        return $this->belongsTo(Plat::class, 'idPlat', 'idPlat');
    }

    /**
     * Get the client who rated the dish.
     *
     * This defines a many-to-one relationship between etoiles and clients.
     * Each etoile belongs to one client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idClient');
    }
}
