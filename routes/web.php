<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckForAuth;

// Authentication routes with email verification enabled
Auth::routes([
    'verify' => true
]);

// Landing page route without 'verified' middleware
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes for viewing properties
Route::get('/properties/single/{id}', [App\Http\Controllers\PropertyController::class, 'single'])->name('properties.single');

// Routes for property application process with 'verified' middleware
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/property/save', [App\Http\Controllers\PropertyController::class, 'saveProperty'])->name('save.property');
    Route::post('/jobs/apply', [App\Http\Controllers\PropertyController::class, 'applyProperty'])->name('apply.property');
});

// Admin login and dashboard routes
Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'viewLogin'])->name('view.login')->middleware(CheckForAuth::class);
Route::post('admin/login', [App\Http\Controllers\AdminController::class, 'checkLogin'])->name('check.login');

// Admin dashboard route (already protected by 'auth:admin' middleware)
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
});

// Admin routes for managing clients, categories, properties, and applications
Route::middleware('auth:admin')->group(function () {
    Route::get('/admins/all-clients', [App\Http\Controllers\AdminController::class, 'viewClients'])->name('view.clients');
    Route::get('/display-categories', [App\Http\Controllers\AdminController::class, 'displayCategories'])->name('display.categories');
    Route::get('/create-categories', [App\Http\Controllers\AdminController::class, 'createCategories'])->name('create.categories');
    Route::post('/create-categories', [App\Http\Controllers\AdminController::class, 'storeCategories'])->name('store.categories');
    Route::get('/display-properties', [App\Http\Controllers\AdminController::class, 'displayProperties'])->name('display.properties');
    Route::get('/create-properties', [App\Http\Controllers\AdminController::class, 'createProperties'])->name('create.properties');
    Route::post('/create-properties', [App\Http\Controllers\AdminController::class, 'storeProperties'])->name('properties.store');
    Route::get('/display-applications', [App\Http\Controllers\AdminController::class, 'displayApplications'])->name('display.applications');
});
