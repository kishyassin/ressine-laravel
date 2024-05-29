<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use App\Models\Testimoniale;

class IndexController extends Controller
{
    public function index()
    {
        $topPlatsByCategory = Plat::getTopPlatsByCategory();
        $topSevenPlats = Plat::getTopSevenPlats();
        $acceptedTestimonials = Testimoniale::fourAcceptedTestimonials();
        return view('index', compact('topPlatsByCategory', 'topSevenPlats', 'acceptedTestimonials'));
    }
    public function loginRestaurant(){
        return view('loginRestaurant');
    }
    public function signupRestaurant(){
        return view('signupRestaurant');
    }

}
