<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::get('data',[dummyAPI::class,'get_data']);

    Route::get("product/{id?}",[ProductController::class,"show_list"]);

    Route::post("add",[ProductController::class,"add"]);

    Route::put("update",[ProductController::class,"update"]);

    Route::delete("delete/{id}",[ProductController::class,"delete"]);

    Route::get("search/{name}",[ProductController::class,"search"]);

    Route::post("validate",[ProductController::class,"test_data"]);

    Route::apiResource("resource",ResourceController::class);
});



Route::post("login",[UserController::class,"index"]);

Route::post("upload",[FileController::class,"upload"]);