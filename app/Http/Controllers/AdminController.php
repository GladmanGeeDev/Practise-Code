<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Property;
use App\Models\User;
use App\Models\Category;
use App\Models\PropertyApply;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::select()->count();

        $categories = Category::select()->count();

        $application_property = PropertyApply::select()->count();

        return view("admin.dashboard", compact('properties', 'categories', 'application_property'));
    }

    public function viewLogin()
    {
        return view('admin.view-login');
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admin.dashboard');
        }
        return redirect()->route('home')->with(['error' => 'error logging in']);
    }

    public function viewClients(){

        $clients = User::all();

        return view("admin.clients", compact('clients'));

    }

    public function displayCategories(){

        $categories = Category::all();

        return view("admin.display-categories", compact('categories'));

    }

    public function createCategories(){

        return view("admin.create-categories");
    }

    
    public function storeCategories(Request $request){

        Request()->validate([
            'name' => "required|max:40",
        ]);

        $createCategory = Category::create([
            'name' => $request->name,
        ]);

        if($createCategory) {
            return redirect('/display-categories/')->with('create', 'Category created Successfully');
        }

        
    }

    public function displayApplications(){

        $applications = PropertyApply::all();

        return view("admin.display-applications", compact('applications'));

    }

    public function displayProperties(){

        $properties = Property::all();

        return view("admin.display-properties", compact('properties'));

    }

    public function createProperties(){

        $categories = Category::all();

        return view("admin.create-properties", compact('categories'));
    }


    public function storeProperties(Request $request){

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'city' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'price' => 'required|integer',
            'status' => 'required|string|max:255',
        ]);

        $property = new Property($request->all());

        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('assets/images/'), $imageName);
            $property->image = $imageName; // Store just the filename
        }
        
        $property->save();


        // $createProperty = Property::create([
        //     'title' => $request->title,
        //     'property_city' => $request->city,
        //     'property_type' => $request->type,
        //     'property_category_id' => $request->category_id,
        //     'image' => $myimage,
        //     'property_price' => $request->price,
        //     'description' => $request->description,
        //     'property_status' => $request->status,
        // ]);

        // if($createProperty) {
        //     return redirect('/display-properties/')->with('create', 'Property created Successfully');
        // }

        return redirect('/display-properties/')->with('success', 'Property created successfully.');

        

        
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
