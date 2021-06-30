<?php

use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EtatTerminalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilisateurController;
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
//Etat-Terminal
Route::post("addEtatTerminal", [EtatTerminalController::class, 'add']);
Route::get("getallEtatTerminal", [EtatTerminalController::class, 'getall']);
Route::get("getOneEtatTerminal/{id}", [EtatTerminalController::class, 'getOne']);
Route::delete("deleteEtatTerminal/{id}", [EtatTerminalController::class, 'delete']);
Route::put("updateEtatTerminal/{id}", [EtatTerminalController::class, 'update']);
Route::get("getlast", [EtatTerminalController::class, 'getLast']);
//Administrateur
Route::get("/user", [UserController::class, 'user'])->middleware('auth:api');
Route::post("register", [UserController::class, 'register']);
Route::post("login", [UserController::class, 'login']);
Route::get("getallusers", [UserController::class, 'getall']);
Route::delete("deleteadmin/{id}", [UserController::class, 'deleteadmin']);
Route::get("getoneadmin/{id}", [UserController::class, 'getoneadmin']);

//Département
Route::post("addDepartement", [DepartementController::class, 'add']);
Route::get("getallDepartement", [DepartementController::class, 'getall']);
Route::delete("deletedep/{id}", [DepartementController::class, 'deletedep']);

//Utilisateur
Route::post("addUtilisateur", [UtilisateurController::class, 'add']);
Route::get("getallUtilisateur", [UtilisateurController::class, 'getall']);
Route::delete("deleteutilisateur/{id}", [UtilisateurController::class, 'deleteutilisateur']);
Route::get("getoneutilisateur/{id}", [UtilisateurController::class, 'getoneutilisateur']);
Route::put("updateutilisateur/{id}", [UtilisateurController::class, 'editutilisateur']);
