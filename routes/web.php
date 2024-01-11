<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class,'index'])->name ('home');
Route::get ("/login",[\App\Http\Controllers\HomeController::class,"login"])->name ("login");
Route::get ('/products/{slug}',[\App\Http\Controllers\ProductController::class,'show'])->name ('show-product');
Route::get ("/cart", [\App\Http\Controllers\ProductController::class,"showCart"])->name ("show-cart");
Route::get ("/checkout", [\App\Http\Controllers\ProductController::class,"checkout"])
    ->name ("checkout")->middleware ("checkout");
Route::get ("/profile",[\App\Http\Controllers\HomeController::class,'profile'])->name ("profile")->middleware ("auth");
Route::get ("/logout",[\App\Http\Controllers\HomeController::class,"logout"]) ->name ("logout")->middleware ("auth");
