<?php

namespace App\Http\Controllers;

use App\Models\Testimoniale;
use Illuminate\Http\Request;

class TestimonialeController extends Controller
{
    public function fourAcceptedTestimoniales()
    {
        $fourAcceptedTestimonials = Testimoniale::fourAcceptedTestimonials();
    }
}
