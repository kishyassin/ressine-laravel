<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Http\Request;

class ReserverController extends Controller
{
    

    public function bookingPage(){
        return view('booking');
    }

}
