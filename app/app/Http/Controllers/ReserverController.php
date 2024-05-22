<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReserverController extends Controller
{
    public function bookingPage($idPlat)
    {
        return view("booking");
    }
}
