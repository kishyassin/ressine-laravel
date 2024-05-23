<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Table extends Model
{
    use HasFactory;

    protected $primaryKey = 'numeroTable';

    public function reservers()
    {
        return $this->hasMany(Reserver::class, 'numeroTable', 'numeroTable');
    }
}
