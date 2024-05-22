<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Plat extends Model
{
    use HasFactory;

    public function getTopThree()
    {
        // Subquery to get the top plat from each category based on etoiles
        $query = "
        WITH ranked_plats AS (
            SELECT *,
                   ROW_NUMBER() OVER (PARTITION BY idCategorie ORDER BY etoiles DESC, idPlat ASC) AS rn
            FROM plats
        )
        SELECT p.*, c.designation as categoryName, c.description as categoryDescription
        FROM ranked_plats p
        INNER JOIN categories c ON p.idCategorie = c.idCategorie
        WHERE p.rn = 1
        ORDER BY p.etoiles DESC
        LIMIT 3
    ";

    $topPlats = DB::select($query);


        return $topPlats;
    }
}
