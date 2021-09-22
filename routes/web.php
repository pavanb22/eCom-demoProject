<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\FormController;
use App\Mail\SampleMail;
use App\Http\Controllers\MultipleDataController;
use App\Http\Controllers\SearchController;

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

Route::get("list",[MultipleDataController::class,"list"]);


Route::get('search', function () {
    return view('search');
});
Route::post("search",[SearchController::class,"search_user"]);
Route::get("/user-detail/{id}",[SearchController::class,"user_detail"]);
Route::get("/view-user/{id}/{notify_id?}",[SearchController::class,"view_user"]);
Route::get("/mark-read",[SearchController::class,"mark_as_read"]);
Route::get("/all-notification",[SearchController::class,"all_notification"]);

Route::get('/forgot-password', function () {
    return view('forgotpassword');
});
Route::post("/forgot-password",[UserController::class,"forgot_password"]);

Route::get('/reset-password/{id}', function ($id) {
    return view('resetpassword',['id' => $id]);
});

Route::post("/reset-password/{id}",[UserController::class,"update_password"]);

Route::get("/google",[UserController::class,"redirect_google"]);
Route::get("/google/callback",[UserController::class,"handle_google_callback"]);

Route::get("/facebook",[UserController::class,"redirect_facebook"]);
Route::get("/facebook/callback",[UserController::class,"handle_facebook_callback"]);