<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\XheckForAuth;



Auth::routes([
    'verify' => true
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/properties/single/{id}', [App\Http\Controllers\PropertyController::class, 'single'])->name('properties.single');

Route::post('/property/save', [App\Http\Controllers\PropertyController::class, 'saveProperty'])->name('save.property');

Route::post('/jobs/apply', [App\Http\Controllers\PropertyController::class, 'applyProperty'])->name('apply.property');




Route::get('admin/login', [App\Http\Controllers\AdminController::class, 'viewLogin'])->name('view.login')->middleware(XheckForAuth::class);

Route::post('admin/login', [App\Http\Controllers\AdminController::class, 'checkLogin'])->name('check.login');

Route::get('admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');



Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
});

Route::get('/admins/all-clients', [App\Http\Controllers\AdminController::class, 'viewClients'])->name('view.clients');

Route::get('/display-categories', [App\Http\Controllers\AdminController::class, 'displayCategories'])->name('display.categories');

Route::get('/create-categories', [App\Http\Controllers\AdminController::class, 'createCategories'])->name('create.categories');
Route::post('/create-categories', [App\Http\Controllers\AdminController::class, 'storeCategories'])->name('store.categories');

Route::get('/display-properties', [App\Http\Controllers\AdminController::class, 'displayProperties'])->name('display.properties');

Route::get('/create-properties', [App\Http\Controllers\AdminController::class, 'createProperties'])->name('create.properties');
Route::post('/create-properties', [App\Http\Controllers\AdminController::class, 'storeProperties'])->name('properties.store');

Route::get('/display-applications', [App\Http\Controllers\AdminController::class, 'displayApplications'])->name('display.applications');