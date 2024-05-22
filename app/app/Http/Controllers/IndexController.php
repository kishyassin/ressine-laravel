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
        $acceptedTestimonials = Testimoniale::with(['clients', 'clients.orderDates'])->take(4)->get();
    
        return view('index', compact('topPlatsByCategory', 'topSevenPlats', 'acceptedTestimonials'));
    }

}
