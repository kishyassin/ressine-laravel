<?php

namespace App\Models;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plat extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPlat';

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'idCategorie', 'idCategorie');
    }
    public function etoiles()
    {
        return $this->hasMany(Etoile::class, 'idPlat', 'idPlat');
    }
    public function images()
    {
        return $this->hasMany(Image::class, 'idPlat', 'idPlat');
    }


    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idPlat','idPlat');
    }

    public function composer()
    {
        return $this->hasMany(Composer::class, 'idPlat', 'idPlat');
    }

    public static function getTopPlatsByCategory()
    {
        // Define an array to store the top plats for each category
        $topPlatsByCategory = [];
    
        // Retrieve all categories
        $categories = Categorie::all();
    
        // Loop through each category
        foreach ($categories as $category) {
            // Retrieve the top three plats for the current category
            $topPlats = Plat::select('plats.*', \DB::raw('AVG(etoiles.nombreEtoile) as avg_star_rating'), 'images.imageHero')
                ->join('etoiles', 'plats.idPlat', '=', 'etoiles.idPlat')
                ->join('images', 'plats.idPlat', '=', 'images.idPlat') // Join with the images table
                ->where('plats.idCategorie', $category->idCategorie)
                ->withCount('commandes') // Count the number of times the plat was bought
                ->groupBy('plats.idPlat', 'plats.designationPlat', 'plats.descriptionPlat', 'plats.prixUnitaire', 'images.imageHero', 'plats.idCategorie', 'plats.created_at', 'plats.updated_at')
                ->orderByDesc('commandes_count') // Order by the number of times bought
                ->orderByDesc('avg_star_rating') // Then by average star rating
                ->limit(3) // Limit to top three plats
                ->get();
    
            // Add the top plats for the current category to the array
            $topPlatsByCategory[$category->designation] = $topPlats;
        }
    
        return $topPlatsByCategory;
    }
    

    public static function getTopSevenPlats()
{
    // Retrieve the top seven plats based on stars and purchases
    $topPlats = Plat::select('plats.*', \DB::raw('AVG(etoiles.nombreEtoile) as avg_star_rating'), 'images.imageSlide')
        ->join('etoiles', 'plats.idPlat', '=', 'etoiles.idPlat')
        ->join('images', 'plats.idPlat', '=', 'images.idPlat') // Join with the images table
        ->withCount('commandes') // Count the number of times the plat was bought
        ->groupBy('plats.idPlat', 'plats.designationPlat', 'plats.descriptionPlat', 'plats.prixUnitaire', 'images.imageSlide', 'plats.idCategorie', 'plats.created_at', 'plats.updated_at')
        ->orderByDesc('commandes_count') // Order by the number of times bought
        ->orderByDesc('avg_star_rating') // Then by average star rating
        ->limit(7) // Limit to top seven plats
        ->get();

    return $topPlats;
}

}
