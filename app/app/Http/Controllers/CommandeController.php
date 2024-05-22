<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    public function topThreePlats(){
        $commande = new Commande();
        $commande->getTopThree();
        return view('test',["plats"=>$commande]);
    }
}
