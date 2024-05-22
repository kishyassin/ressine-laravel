<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserver extends Model
{

    protected $primaryKey = null;
    public $incrementing = false;
    public function client()
    {
        return $this->belongsTo(Client::class, 'idClient', 'idClient');
    }

    public function table()
    {
        return $this->belongsTo(Table::class, 'numeroTable', 'numeroTable');
    }

    public function orderDate()
    {
        return $this->belongsTo(OrderDate::class, 'idDate', 'idDate');
    }

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'idCategorie', 'idCategorie');
    }
}
