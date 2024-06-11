<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Plat;
use App\Models\Facture;
use App\Models\Commande;
use App\Models\OrderDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    public function create(Request $request)
{
    $idPlat = $request->idPlat;
    $details = Plat::getDetailsPlat($idPlat);
    
    if (!$details) {
        // Handle the case where no details are found
        return redirect()->back()->with('error', 'Plat not found');
    }

    return view('ordering', compact('details'));
}
public function store(Request $request)
{
    // Debugging statement to check if user is authenticated
    if (!Auth::check()) {
        return redirect()->back()->with('error', 'User not authenticated');
    }

    // Get idClient from the session
    $idClient = Auth::user()->idClient;

    // Debugging statement to check the idClient value
    if (!$idClient) {
        return redirect()->back()->with('error', 'idClient is null');
    }

    // Validate the incoming request data
    $request->validate([
        'adresseLivraison' => 'nullable|string|max:255',
        'idDate' => 'required|date',
        'idPlat' => 'required|integer',
    ]);

    // Insert or retrieve the order date
    $orderDate = OrderDate::firstOrCreate(
        ['jjmmaaaa' => $request->input('idDate')],
        ['created_at' => now(), 'updated_at' => now()]
    );

    // Generate the numeroFacture
    $timestamp = Carbon::now()->timestamp;
    $numeroFacture = $idClient . $request->input('idPlat') . $timestamp;

    // Insert a new facture
    $facture = Facture::create([
        'numeroFacture' => $numeroFacture,
        'etat' => 'pending',
        'idDate' => $orderDate->idDate,
        'created_at' => now(),
        'updated_at' => now()
    ]);

    // Create the order
    Commande::create([
        'etat' => 'pending',
        'adresseLivraison' => $request->input('adresseLivraison'),
        'idDate' => $orderDate->idDate,
        'numeroFacture' => $facture->numeroFacture,
        'idLivreur' => null,
        'idClient' => $idClient,
        'idPlat' => $request->input('idPlat'),
    ]);

    return redirect()->route('/');
}

}
