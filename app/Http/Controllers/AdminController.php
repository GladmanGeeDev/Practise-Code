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
