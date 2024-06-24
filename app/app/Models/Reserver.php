<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Reserver Model
 *
 * Represents a reservation made by a client.
 */
class Reserver extends Model
{
    use HasFactory;

    // Disable auto-incrementing for the primary key
    protected $primaryKey = null;
    public $incrementing = false;

    /**
     * Get the client who made the reservation.
     *
     * This defines a many-to-one relationship between reservations and clients.
     * Each reservation belongs to one client.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idClient');
    }

    /**
     * Get the table reserved for this reservation.
     *
     * This defines a many-to-one relationship between reservations and tables.
     * Each reservation belongs to one table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function table()
    {
        return $this->belongsTo(Table::class, 'numeroTable', 'numeroTable');
    }

    /**
     * Get the order date associated with this reservation.
     *
     * This defines a many-to-one relationship between reservations and order dates.
     * Each reservation belongs to one order date.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderDate()
    {
        return $this->belongsTo(OrderDate::class, 'idDate', 'idDate');
    }



}
