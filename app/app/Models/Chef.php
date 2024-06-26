<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Chef extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'telephone',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];    // Specify the table associated with the model
    protected $table = 'chefs';

    // Specify the primary key for the model
    protected $primaryKey = 'idChef';

    // Indicates if the model should be timestamped
    public $timestamps = true;

    static public function getFourChefs(){
        return Chef::orderBy('created_at', 'asc')->take(4)->get();
    }
}
