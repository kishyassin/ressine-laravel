<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    use HasFactory;
    // Specify the table associated with the model
    protected $table = 'chefs';

    // Specify the primary key for the model
    protected $primaryKey = 'idChef';

    // Indicates if the model should be timestamped
    public $timestamps = true;

    static public function getFourChefs(){
        return Chef::orderBy('created_at', 'asc')->take(4)->get();
    }
}
