<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlatController extends Controller
{
    // public function topThreePlats(){
    //     $plats = new Plat();
    //     $topThreePlats = $plats->getTopThree();
    //     return view('index',["topThreePlats"=>$topThreePlats]);
    // }

    public function topPlatsByCategory()
    {
        $topPlatsByCategory = Plat::getTopPlatsByCategory();

        return view('index')->with('topPlatsByCategory', $topPlatsByCategory);
    }
}
