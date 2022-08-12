<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/insertCategory', 'App\Http\Controllers\CategoryController@addCategory');
Route::post('/addToStock', 'App\Http\Controllers\ProductController@addProduct');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $p = new ProductController;

    return view('dashboard', ['data' => $p->allKsProducts()]);
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboardMk', function () {
    $p = new ProductController;

    return view('dashboardMk', ['data' => $p->allMkProducts()]);
})->name('dashboardMk');

Route::middleware(['auth:sanctum', 'verified'])->get('/addCategory', function () {
    return view('addCategory');
})->name('addCategory');

Route::middleware(['auth:sanctum', 'verified'])->get('/fillStock', function () {
    $categoriesKs = \App\Models\Category::where('country_code','KS')->get();
    $categoriesMk = \App\Models\Category::where('country_code','MK')->get();
    return view('fillStock', ['categoriesKs' => $categoriesKs, 'categoriesMk' => $categoriesMk ]);
})->name('fillStock');

Route::middleware(['auth:sanctum', 'verified'])->get('/invoiceKs', function () {
    $p = new ProductController;
    return view('invoiceKs', ['categories' => $p->allKsProducts()]);
})->name('invoiceKs');

Route::middleware(['auth:sanctum', 'verified'])->get('/invoiceMk', function () {
    $p = new ProductController;
    return view('invoiceMk', ['categories' => $p->allMkProducts()]);
})->name('invoiceMk');
