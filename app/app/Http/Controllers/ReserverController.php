<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Http\Request;

class ReserverController extends Controller
{
    public function bookingPage(Request $request)
{
    $idPlat = $request->idPlat;
    $details = Plat::getDetailsPlat($idPlat);
    
    if (!$details) {
        // Handle the case where no details are found
        return redirect()->back()->with('error', 'Plat not found');
    }

    return view('booking', compact('details'));
}

}
