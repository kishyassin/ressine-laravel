<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $primaryKey = 'numeroTable';

    public function reservers()
    {
        return $this->hasMany(Reserver::class, 'numeroTable', 'numeroTable');
    }
}
