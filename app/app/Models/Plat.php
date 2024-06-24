<?php

namespace App\Models;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Plat extends Model
{
    use HasFactory;

    protected $primaryKey = 'idPlat';

    public function categorie()
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
        return $this->hasMany(Commande::class, 'idPlat', 'idPlat');
    }

    public function composer()
    {
        return $this->hasMany(Composer::class, 'idPlat', 'idPlat');
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'composers', 'idPlat', 'idIngredient');
    }

    public static function getTopPlatsByCategory()
{
    // Define an array to store the top plat for each category
    $topPlatByCategory = [];

    // Retrieve all categories
    $categories = Categorie::all();

    // Loop through each category
    foreach ($categories as $category) {
        // Retrieve the top plat for the current category
        $topPlat = Plat::select('plats.*', \DB::raw('AVG(etoiles.nombreEtoile) as avg_star_rating'), 'images.imageHero')
            ->leftJoin('etoiles', 'plats.idPlat', '=', 'etoiles.idPlat')
            ->leftJoin('images', 'plats.idPlat', '=', 'images.idPlat') // Join with the images table
            ->where('plats.idCategorie', $category->idCategorie)
            ->withCount('commandes') // Count the number of times the plat was bought
            ->groupBy('plats.idPlat', 'plats.designationPlat', 'plats.descriptionPlat', 'plats.prixUnitaire', 'images.imageHero', 'plats.idCategorie', 'plats.created_at', 'plats.updated_at')
            ->orderByDesc('commandes_count') // Order by the number of times bought
            ->orderByDesc('avg_star_rating') // Then by average star rating
            ->limit(1) // Limit to the top one plat
            ->first(); // Get the first result

        // Ensure we only add non-null top plats to the array
        if ($topPlat) {
            $topPlatByCategory[$category->designation] = $topPlat;
        }
    }

    return $topPlatByCategory;
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
// public static function getDetailsPlat($idPlat)
// {
//     $detailsPlat = Plat::select('plats.*', 'images.imageHero')
//         ->join('images', 'plats.idPlat', '=', 'images.idPlat')
//         ->where('plats.idPlat', $idPlat)
//         ->first(); // Ensure it returns a single result
//     return $detailsPlat;
// }
public static function getDetailsPlat($idPlat)
{
    // Récupérer les détails du plat avec l'image hero et les ingrédients
    $detailsPlat = Plat::with(['images' => function ($query) {
        $query->select('idPlat', 'imageHero');
    }, 'ingredients'])
    ->where('idPlat', $idPlat)
    ->first();

    // Si les détails du plat sont trouvés
    if ($detailsPlat) {
        // Récupérer la première image hero de la collection d'images
        $detailsPlat->imageHero = $detailsPlat->images->first()->imageHero ?? null;
    }

    return $detailsPlat;
}

}
