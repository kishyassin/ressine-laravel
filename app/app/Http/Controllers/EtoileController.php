<?php

namespace App\Http\Controllers;

use App\Models\Etoile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtoileController extends Controller
{
    public function rate(Request $request, $idPlat)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
        ]);

        // Check if the client has already rated this plat
        $existingRating = Etoile::where('idPlat', $idPlat)->where('idClient', Auth::id())->first();
        if ($existingRating) {
            return redirect()->route('plat.details', ['idPlat' => $idPlat])->with('error', 'You have already rated this plat.');
        }

        $etoile = new Etoile();
        $etoile->idPlat = $idPlat;
        $etoile->idClient = Auth::id();
        $etoile->nombreEtoile = $request->input('rating');
        $etoile->save();

        return redirect()->route('plat.details', ['idPlat' => $idPlat])->with('success', 'Thank you for your rating!');
    }
}
