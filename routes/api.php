<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TypeEtatController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("addTypeetat",[TypeEtatController::class,'add']);
Route::get("getallTypeetat",[TypeEtatController::class,'getall']);
Route::get("getOneTypeetat/{id}",[TypeEtatController::class,'getOne']);
Route::delete("deleteTypeetat/{id}",[TypeEtatController::class,'delete']);
Route::put("updateTypeetat/{id}",[TypeEtatController::class,'update']);


