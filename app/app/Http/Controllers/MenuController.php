<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Models\Categorie;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $plats = Plat::all();
        
        return view('menu', compact('categories', 'plats'));
    }
}
