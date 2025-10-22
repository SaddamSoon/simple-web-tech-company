<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Gallery;
use App\Models\Contact;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'services' => Service::count(),
            'galleries' => Gallery::count(),
            'contacts' => Contact::count(),
        ];
        
        return view('admin.dashboard', compact('stats'));
    }
}