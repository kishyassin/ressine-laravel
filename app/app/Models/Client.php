<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Client Model
 *
 * Represents a client in the system.
 */
class Client extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $primaryKey = 'idClient';

    protected $fillable = [
        'name',  'imageClient', 'telephone', 'adresseClient',  'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    // Specify the table associated with the model
    protected $table = 'clients';



    // Indicates if the model should be timestamped
    public $timestamps = true;

    /**
     * Get the payments for the client.
     *
     * This defines a one-to-many relationship between clients and payments.
     * Each client can have multiple payments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function paiements()
    {
        return $this->hasMany(Paiement::class, 'idClient', 'idClient');
    }

    /**
     * Get the orders for the client.
     *
     * This defines a one-to-many relationship between clients and orders.
     * Each client can have multiple orders.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idClient', 'idClient');
    }

    /**
     * Get the ratings (stars) given by the client.
     *
     * This defines a one-to-many relationship between clients and stars.
     * Each client can give multiple ratings.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function etoiles()
    {
        return $this->hasMany(Etoile::class, 'idClient', 'idClient');
    }

    /**
     * Get the testimonials provided by the client.
     *
     * This defines a one-to-many relationship between clients and testimonials.
     * Each client can provide multiple testimonials.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testimonials()
    {
        return $this->hasMany(Testimoniale::class, 'idClient', 'idClient');
    }

    /**
     * Get the reservations made by the client.
     *
     * This defines a one-to-many relationship between clients and reservations.
     * Each client can make multiple reservations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservations()
    {
        return $this->hasMany(Reserver::class, 'idClient', 'idClient');
    }
}
