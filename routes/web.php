<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PublicController;

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

Route::resource('products',ProductController::class);
Route::resource('sliders',SliderController::class);
//Route::resource('roles',RoleController::class);
Route::get('role',[RoleController::class,'index'])->name('roles.index');
Route::get('roles/{role}',[RoleController::class,'show'])->name('roles.show');
Route::get('products/pdf/',[ProductController::class,'downloadPdf'])->name('products.pdf');


Route::get('/home', function () {
    // dd(auth()->user()->name);
    return view('backend.home');

 })->middleware('auth')->name('home');


 Route::get('/table', function () {
    return view('backend.table');
 })->name('table');


Route::get('/',[PublicController::class,'index']);
Route::get('/product-details/{product}',[PublicController::class,'singleProduct'])
->name('product-details');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
