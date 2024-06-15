<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutImage extends Model
{
    use HasFactory;

    protected $fillable = ['idAbout', 'url', 'position'];

    public function about()
    {
        return $this->belongsTo(About::class);
    }
}