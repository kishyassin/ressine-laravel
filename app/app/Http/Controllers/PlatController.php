<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Models\Etoile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PlatController extends Controller
{
    public function details($idPlat)
    {
        $plat = Plat::findOrFail($idPlat);
        $hasRated = Etoile::where('idPlat', $idPlat)->where('idClient', Auth::id())->exists();
        return view('details', compact('plat', 'hasRated'));
    }

}
