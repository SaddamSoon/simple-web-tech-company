<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Service;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $hero = Content::where('section', 'hero')->first();
        $about = Content::where('section', 'about')->first();
        $services = Service::take(3)->get();
        
        return view('home', compact('hero', 'about', 'services'));
    }
}