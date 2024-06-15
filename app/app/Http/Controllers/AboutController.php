<?php

// app/Http/Controllers/AboutController.php
namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\About;
use App\Models\Service;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::with(['images'])->first();
        $services = Service::all();
        $fourChefs = Chef::orderBy('created_at','asc')->take(4)->get();
        return view('about', compact('about', 'services','fourChefs'));
    }
}
