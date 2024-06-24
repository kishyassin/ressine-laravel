<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Commande;
use App\Models\OrderDate;
use Illuminate\Support\Facades\DB;


class CheckOutController extends Controller
{
    public function confirmCheckout(Request $request)
    {
        DB::beginTransaction();
        try {
            // Étape 1 : Récupérer les données du panier
            $cart = \Cart::session(auth()->id())->getContent();
            $client_id = auth()->id();

            // Étape 2 : Créer une nouvelle date de commande
            $orderDate = OrderDate::create([
                'jjmmaaaa' => now(),
            ]);

            // Étape 3 : Créer une nouvelle facture
            $facture = Facture::create([
                'etat' => 'en attente', // ou tout autre statut par défaut
                'idDate' => $orderDate->id,
                'idClient' => $client_id,
                // 'idLivreur' => null, // Ajouter si nécessaire
            ]);

            // Étape 4 : Créer les lignes de facture
            foreach ($cart as $item) {
                Commande::create([
                    'etat' => 'en attente', // ou tout autre statut par défaut
                    'adresseLivraison' => $request->adresseLivraison,
                    'idDate' => $orderDate->id,
                    'numeroFacture' => $facture->numeroFacture,
                    'idPlat' => $item->id,
                    'prixVente' => $item->price,
                    'quantite' => $item->quantity,
                ]);
            }

            DB::commit();

            // Vider le panier après confirmation
            \Cart::session(auth()->id())->clear();

            return response()->json(['message' => 'Checkout successful'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Checkout failed', 'error' => $e->getMessage()], 500);
        }
    }
}
