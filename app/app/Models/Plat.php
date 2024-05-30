<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Plat Model
 *
 * Represents a dish.
 */
class Plat extends Model
{
    use HasFactory;

    // Specify the primary key for the model
    protected $primaryKey = 'idPlat';

    /**
     * Get the category to which this dish belongs.
     *
     * This defines a many-to-one relationship between plats and categories.
     * Each plat belongs to one category.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Categorie::class, 'idCategorie', 'idCategorie');
    }

    /**
     * Get the ratings (etoiles) for this dish.
     *
     * This defines a one-to-many relationship between plats and etoiles.
     * Each plat may have multiple etoiles (ratings) associated with it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function etoiles()
    {
        return $this->hasMany(Etoile::class, 'idPlat', 'idPlat');
    }

    /**
     * Get the images associated with this dish.
     *
     * This defines a one-to-many relationship between plats and images.
     * Each plat may have multiple images associated with it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany(Image::class, 'idPlat', 'idPlat');
    }

    /**
     * Get the orders placed for this dish.
     *
     * This defines a one-to-many relationship between plats and commandes.
     * Each plat may have multiple commandes placed for it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function commandes()
    {
        return $this->hasMany(Commande::class, 'idPlat', 'idPlat');
    }

    /**
     * Get the ingredients used in this dish.
     *
     * This defines a one-to-many relationship between plats and composers.
     * Each plat may have multiple composers (ingredient combinations) associated with it.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function composer()
    {
        return $this->hasMany(Composer::class, 'idPlat', 'idPlat');
    }



  //  model functions:

    //top 7 plats
    public static function getTopSevenPlats()
    {
        // Select the top seven plats based on their ratings
        return self::orderBy('etoiles_count', 'desc')
            ->limit(7)
            ->get();
    }

    //  get top three plats for each category
    public static function getTopPlatsByCategory()
    {
        // Subquery to get the maximum etoiles_count for each category
        $subquery = DB::table('plats')
            ->select('idCategorie', DB::raw('MAX(etoiles_count) as max_etoiles_count'))
            ->groupBy('idCategorie')
            ->toSql();

        // Main query to join with the subquery and retrieve the top plats for each category
        return DB::table('plats AS p1')
            ->select('p1.*', 'c.designation as category')
            ->join(DB::raw("({$subquery}) AS max_counts"), function ($join) {
                $join->on('p1.idCategorie', '=', 'max_counts.idCategorie')
                    ->on('p1.etoiles_count', '=', 'max_counts.max_etoiles_count');
            })
            ->join('categories as c', 'p1.idCategorie', '=', 'c.idCategorie')
            ->get();
    }



}
