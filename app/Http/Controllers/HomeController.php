<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Category;
use App\Http\Controllers\PropertyController;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *


 
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        {
            $properties = Property::select()->take(3)->orderby('id', 'desc')->get();
            $totalProperties = Property::all()->count();
            return view('home', compact('properties', 'totalProperties'));
        }
    }
}
