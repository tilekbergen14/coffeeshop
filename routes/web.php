<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

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
Route::get('/about', function () {
    return view('about');
})->name("about");

Route::get('/store', [ProductsController::class, 'index'])->name("store");
Route::get('/login', [LoginController::class, 'index'])->name("login");
Route::post('/login', [LoginController::class, 'store'])->name("login");

Route::get('/register', [RegisterController::class, 'index'])->name("register");
Route::post('/register', [RegisterController::class, 'store'])->name("register");

Route::get('/logout', [LogoutController::class, 'index'])->name("logout");


Route::get('/admin', [AdminController::class, 'index'])->name("admin");

Route::get('/admin/createproduct', [ProductsController::class, 'createproduct_get'])->name("createproduct");
Route::post('/admin/createproduct', [ProductsController::class, 'createproduct_post'])->name("createproduct");

Route::delete('/admin/deletepost/{id}', [ProductsController::class, 'delete'])->name("delete");

Route::get('/dashboard', [DashboardController::class, "index"])->name("dashboard");


Route::get('/', function () {
    $products = Product::take(6)->get();
    return view('welcome', ["products" => $products]);
})->name("home");

//card
Route::post('/addtocard/{product}', [ProductsController::class, 'addtocard'])->name("addtocard");
