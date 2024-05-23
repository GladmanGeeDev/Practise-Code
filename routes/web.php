<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/properties/single/{id}', [App\Http\Controllers\PropertyController::class, 'single'])->name('properties.single');

