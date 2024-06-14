<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function chefs(){
        $fourChefs = Chef::getFourChefs();
        return view('about', compact('fourChefs'));
    }
}
