<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Models\Categorie;
use App\Models\Testimoniale;

class IndexController extends Controller
{
    public function index()
    {
        $topPlatsByCategory = Plat::getTopPlatsByCategory();
        $topSevenPlats = Plat::getTopSevenPlats();
        $acceptedTestimonials = Testimoniale::fourAcceptedTestimonials();
        $categories = Categorie::all();
        $plats = Plat::all();
        return view('index', compact('topPlatsByCategory', 'topSevenPlats', 'acceptedTestimonials','categories', 'plats'));
    }
    public function loginRestaurant(){
        return view('loginRestaurant');
    }
    public function signupRestaurant(){
        return view('signupRestaurant');
    }

}
