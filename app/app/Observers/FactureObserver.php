<?php

namespace App\Observers;

use App\Models\Facture;
use App\Models\Commande;
use Auth;

class FactureObserver
{
    /**
     * Handle the Facture "updated" event.
     *
     * @param  \App\Models\Facture  $facture
     * @return void
     */
    public function updated(Facture $facture)
    {
        if ($facture->etat == 'livrée') {
            $facture->commandes()->update(['etat' => 'livrée']);
            $facture->idLivreur = Auth::guard('livreur')->id();
            $facture->reglee = 1;
            $facture->save(); // Save the updated idLivreur
        } elseif ($facture->etat == 'en livraison') {
            $facture->commandes()->update(['etat' => 'en livraison']);
        } elseif ($facture->etat == 'en attente') {
            $facture->commandes()->update(['etat' => 'preparée']);
        }
    }

}



