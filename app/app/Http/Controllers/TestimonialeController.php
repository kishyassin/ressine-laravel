<?php

namespace App\Http\Controllers;

use App\Models\Testimoniale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimonialeController extends Controller
{
    public function fourAcceptedTestimoniales()
    {
        $fourAcceptedTestimonials = Testimoniale::fourAcceptedTestimonials();
        return $fourAcceptedTestimonials;
    }
    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        Testimoniale::create([
            'message' => $request->input('message'),
            'jjmmaaaa' => now()->format('Y-m-d'),
            'etatTestimoniale' => false,
            'idClient' => Auth::id(),
        ]);

        return back()->with('success', 'Merci pour votre témoignage!');
    }
}
