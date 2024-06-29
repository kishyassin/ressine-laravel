<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Models\Etoile;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlatController extends Controller
{
    public function details($idPlat)
    {
        $plat = Plat::where('idPlat', $idPlat)
            ->withAvg('etoiles', 'nombreEtoile')
            ->firstOrFail();

        $hasRated = Etoile::where('idPlat', $idPlat)
            ->where('idClient', Auth::id())
            ->exists();

        $categories = Categorie::all();
        $plats = Plat::all();

        return view('details', compact('plat', 'hasRated', 'categories', 'plats'));
    }

}
