<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $services = \App\Models\Service::all();
        $testimonials = \App\Models\Testimonial::where('is_active', true)->latest()->get();
        return view('home', compact('services', 'testimonials'));
    }

    public function gallery()
    {
        $mediaImages = \App\Models\Media::where('type', 'image')->latest()->get();
        return view('gallery', compact('mediaImages'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        return view('about');
    }
}
