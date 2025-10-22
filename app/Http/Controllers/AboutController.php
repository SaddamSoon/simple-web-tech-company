<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = Content::where('section', 'about')->first();
        
        return view('about', compact('about'));
    }
}