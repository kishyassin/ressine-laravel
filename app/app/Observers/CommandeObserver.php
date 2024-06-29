<?php

namespace App\Observers;

use App\Models\Commande;
use Illuminate\Support\Facades\Auth;

class CommandeObserver
{
    /**
     * Handle the Commande "updated" event.
     *
     * @param  \App\Models\Commande  $commande
     * @return void
     */
    public function updated(Commande $commande)
    {
        set_time_limit(300);
        if ($commande->etat == 'preparée') {
            $commande->idChef = Auth::guard('chef')->id();
            $commande->save();
        }
    }
}
