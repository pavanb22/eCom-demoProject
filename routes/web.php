<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\FormController;
use App\Mail\SampleMail;
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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/login', function () {
    return view('login');
});

Route::post("/login",[UserController::class,"login"]);
Route::get("/",[ProductController::class,"index"]);
Route::get("/detail/{id}",[ProductController::class,"detail"]);
Route::post("add_to_cart",[CartController::class,"add_cart"]);
Route::get("cartlist",[CartController::class,"cart_list"]);
Route::get("/remove/{id}",[CartController::class,"remove_cart"]);
Route::get("/order",[OrderController::class,"order_now"]);
Route::post("orderplace",[OrderController::class,"order_place"]);
Route::get("myorder",[OrderController::class,"my_order"]);

Route::get('/logout', function () {
    Session::forget('user');
    return redirect("/login");
}); 

Route::get('/validation','ValidationController@showform');
Route::post('/validation','ValidationController@validateform');
Route::get('form', [FormController::class, 'create'])->name('form.create');
Route::post('store-form', [FormController::class, 'store'])->name('form.store');

Route::get('relation',[UserController::class,'test_relation_one']);

Route::get('/add-product',[ProductController::class,'product']);
Route::post('/add-product',[ProductController::class,'add_product']);

//route model binding
Route::get('bind/{key:name}',[UserController::class,'route_bind']);

//Markdown mail template
Route::get('/mail', function () {
  return new SampleMail();
}); 