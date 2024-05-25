<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Category;
use App\Models\PropertySaved;
use App\Models\PropertyApply;
use Auth;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
     public function single($id)
     {
         $property = Property::find($id);
         $savedProperty = 0;
         $applyProperty = 0;
     
         if (Auth::check()) {
             $userId = Auth::user()->id;
             $savedProperty = PropertySaved::where('property_id', $id)->where('user_id', $userId)->count();
             $applyProperty = PropertyApply::where('property_id', $id)->where('user_id', $userId)->count();
         }
     
         // Getting Related Properties
         $relatedProperties = Property::where('category_id', $property->category_id)->where('id', '!=', $id)->take(4)->get();
         $categories = Category::all();
     
         return view('properties.single', compact('property', 'relatedProperties', 'savedProperty', 'applyProperty'));
     }
     
     public function saveProperty(Request $request)
     {
         if (!Auth::check()) {
             return redirect('/login')->with('error', 'You must be logged in to save a property.');
         }
     
         $saveProperty = PropertySaved::create([
             'property_id' => $request->property_id,
             'user_id' => Auth::user()->id,
             'property_title' => $request->property_title,
             'property_city' => $request->property_city,
             'property_type' => $request->property_type,
             'property_price' => $request->property_price,
             'property_image' => $request->property_image,
         ]);
     
         if ($saveProperty) {
             return redirect('/properties/single/' . $request->property_id)->with('save', 'Property Saved Successfully');
         }
     }
     
     public function applyProperty(Request $request)
     {
         if (!Auth::check()) {
             return redirect('/login')->with('error', 'You must be logged in to apply for a property.');
         }
     
         $applyProperty = PropertyApply::create([
             'property_id' => $request->property_id,
             'user_id' => Auth::user()->id,
             'property_title' => $request->property_title,
             'property_city' => $request->property_city,
             'property_type' => $request->property_type,
             'property_price' => $request->property_price,
             'property_image' => $request->property_image,
         ]);
     
         if ($applyProperty) {
             return redirect('/properties/single/' . $request->property_id)->with('applied', 'Property Applied');
         }
     }
     




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
