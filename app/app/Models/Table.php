<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Table Model
 *
 * Represents a table in the restaurant.
 */
class Table extends Model
{
    use HasFactory;

    // Specify the primary key for the model
    protected $primaryKey = 'numeroTable';

    /**
     * Get the reservations made for this table.
     *
     * This defines a one-to-many relationship between tables and reservations.
     * Each table can have multiple reservations.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reservers()
    {
        return $this->hasMany(Reserver::class, 'numeroTable', 'numeroTable');
    }
}
