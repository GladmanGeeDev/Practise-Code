<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/properties/single/{id}', [App\Http\Controllers\PropertyController::class, 'single'])->name('properties.single');

Route::post('/property/save', [App\Http\Controllers\PropertyController::class, 'saveProperty'])->name('save.property');

Route::post('/jobs/apply', [App\Http\Controllers\PropertyController::class, 'applyProperty'])->name('apply.property');


Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'viewLogin'])->name('view.login');

Route::post('admin/login', [App\Http\Controllers\AdminController::class, 'checkLogin'])->name('check.login');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');