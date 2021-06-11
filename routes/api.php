<?php

use App\Http\Controllers\EtatTerminalController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post("addEtatTerminal",[EtatTerminalController::class,'add']);
Route::get("getallEtatTerminal",[EtatTerminalController::class,'getall']);
Route::get("getOneEtatTerminal/{id}",[EtatTerminalController::class,'getOne']);
Route::delete("deleteEtatTerminal/{id}",[EtatTerminalController::class,'delete']);
Route::put("updateEtatTerminal/{id}",[EtatTerminalController::class,'update']);
Route::get("aa",[UserController::class,'index']);
Route::get("/user",[UserController::class,'user'])->middleware('auth:api');
Route::post("register",[UserController::class,'register']);
Route::post("login",[UserController::class,'login']);
Route::get("getallusers",[UserController::class,'getall']);
Route::get("getlast",[EtatTerminalController::class,'getLast']);




