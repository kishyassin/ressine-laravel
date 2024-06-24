<?php

// app/Models/About.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'welcome_text', 'description', 'additional_info','email','address','telephone'];

    protected $primaryKey = 'idAbout';

    public function images()
    {
        return $this->hasMany(AboutImage::class, 'idAbout');
    }
}
