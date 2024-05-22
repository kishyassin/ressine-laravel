<?php

namespace App\Models;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    protected $primaryKey = 'idPlat';

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'idCategorie', 'idCategorie');
    }

    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idPlat');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'composers', 'idPlat', 'idIngredient')
            ->withTimestamps();
    }

    public static function getTopPlatsByCategory()
    {
        return Categorie::with(['plats' => function($query) {
            $query->withCount('commandes')
                  ->orderBy('commandes_count', 'desc')
                  ->orderBy('etoiles', 'desc');
        }])->get()
        ->map(function ($category) {
            return $category->plats->first(); // Get the top plat in each category
        });
    }

    public static function getTopSevenPlats()
    {
        return Plat::withCount('commandes')
            ->orderBy('commandes_count', 'desc')
            ->orderBy('etoiles', 'desc')
            ->take(7)
            ->get();
    }
}
