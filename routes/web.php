<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products/json_all', [ProductController::class, 'json_all'])->name('json_all')->middleware('auth');;
Route::get('/products/json/{product}', [ProductController::class, 'json_this'])->name('json_this')->middleware('auth');;
Route::resource('products', ProductController::class)->middleware('auth');;
Route::resource('product_attributes', ProductController::class)->middleware('auth');;