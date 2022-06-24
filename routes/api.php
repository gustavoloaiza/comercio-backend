<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

//login
Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);
Route::post('updateUser/{id}',[UserController::class,'updateUser']);
Route::get('listUsers',[UserController::class,'list']);
Route::get('getUser/{id}',[UserController::class,'getUser']);

// producto
Route::post('addProduct',[ProductController::class,'addProduct']);
Route::get('getAllProduct',[ProductController::class,'list']);
Route::get('getProductProd/{id}',[ProductController::class,'listJustProductor']);
Route::delete('deleteProduct/{id}',[ProductController::class,'delete']);
Route::get('getProduct/{id}',[ProductController::class,'getProduct']);
Route::put('updateProduct/{id}',[ProductController::class,'upDateProducto']);
Route::get('search/{key}',[ProductController::class,'search']);
