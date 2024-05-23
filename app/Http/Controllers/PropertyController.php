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

    $savedProperty = PropertySaved::where('property_id', $id)->where('user_id', Auth::user()->id)->count();

    
    //Getting Related Properties
    $relatedProperties = Property::where('category_id', $property->category_id)->where('id', '!=', $id)->take(4)->get();
    $applyProperty = PropertyApply::where('property_id', $id)->where('user_id', Auth::user()->id)->count();

        $categories = Category::all();

    return view ('properties.single', compact('property', 'relatedProperties', 'savedProperty', 'applyProperty'));
  } 

  public function saveProperty(Request $request){
    $saveProperty = PropertySaved::create([
        'property_id' => $request->property_id,
        'user_id' => $request->user_id,
        'property_title' => $request->property_title,
        'property_city' => $request->property_city,
        'property_type' => $request->property_type,
    
        'property_price' => $request->property_price,
        'property_image' => $request->property_image,

    ]);
    
    if($saveProperty) {
        return redirect('/properties/single/'.$request->property_id. '')->with('save', 'Property Saved Sucessfully');
    }

}

public function applyProperty(Request $request){

    $applyProperty = PropertyApply::create([
    
        'property_id' => $request->property_id,
        'user_id' => $request->user_id,
        'property_title' => $request->property_title,
        'property_city' => $request->property_city,
        'property_type' => $request->property_type,
      
        'property_price' => $request->property_price,
        'property_image' => $request->property_image,

    ]);
    if($applyProperty) {
        return redirect('/properties/single/'.$request->property_id. '')->with('applied', 'Property Applied');
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
