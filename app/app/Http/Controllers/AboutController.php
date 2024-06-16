<?php

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
        $fourChefs = Chef::orderBy('created_at', 'asc')->take(4)->get();

        // Calculate dynamic values
        $currentYear = date('Y');
        $yearsOfExperience = $currentYear - $about->starting_year;
        $numberOfChefs = Chef::count();

        return view('about', compact('about', 'services', 'fourChefs', 'yearsOfExperience', 'numberOfChefs'));
    }
}
