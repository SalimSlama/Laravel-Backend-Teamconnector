<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Departement_UtilisateurController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EtatTerminalController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Auth\Notifications\ResetPassword;
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

Route::group(['middleware' => 'api'], function () {

    Route::middleware('auth:api')->get('/user', function (Request $request) {
        return $request->user();
    });
    //Terminal
    Route::post("addTerminal", [TerminalController::class, 'add']);
    Route::get("getallTerminaux", [TerminalController::class, 'getall']);
    Route::get("getOneTerminal/{id}", [EtatTerminalController::class, 'getOneTerminal']);
    Route::put("editTerminal/{id}", [TerminalController::class, 'editTerminal']);
    Route::get("getnameTerminal/{id}", [TerminalController::class, 'getnameTerminal']);



    //Etat-Terminal
    Route::post("addEtatTerminal", [EtatTerminalController::class, 'add']);
    Route::get("getallEtatTerminal", [EtatTerminalController::class, 'getall']);
    Route::get("getOneEtatTerminal/{id}", [EtatTerminalController::class, 'getOne']);
    Route::delete("deleteEtatTerminal/{id}", [EtatTerminalController::class, 'delete']);
    Route::put("updateEtatTerminal/{id}", [EtatTerminalController::class, 'update']);
    Route::get("getlast", [EtatTerminalController::class, 'getLast']);
    Route::get("getLastten", [EtatTerminalController::class, 'getLastten']);

    //Administrateur
    Route::get("/user", [UserController::class, 'user'])->middleware('auth:api');
    Route::post("register", [UserController::class, 'register']);
    Route::post("login", [UserController::class, 'login']);
    Route::get("getallusers", [UserController::class, 'getall']);
    Route::delete("deleteadmin/{id}", [UserController::class, 'deleteadmin']);
    Route::get("getoneadmin/{id}", [UserController::class, 'getoneadmin']);
    Route::put("edituser/{id}", [UserController::class, 'edituser']);

    //Département
    Route::post("addDepartement", [DepartementController::class, 'add']);
    Route::get("getallDepartement", [DepartementController::class, 'getall']);
    Route::delete("deletedep/{id}", [DepartementController::class, 'deletedep']);
    Route::put("editdepartement/{id}", [DepartementController::class, 'editdepartement']);
    Route::get("getonedepartement/{id}", [DepartementController::class, 'getonedepartement']);
    Route::get("getonlytrashed", [DepartementController::class, 'getOnlyTrashed']);
    Route::post("restoredepartement/{id}", [DepartementController::class, 'restoredepartement']);

    //DépartementUtilisateur
    Route::get("getAlluserdepartment", [Departement_UtilisateurController::class, 'getAlluserdepartment']);
    Route::get("getuserdepartment/{id}", [Departement_UtilisateurController::class, 'getuserdepartment']);
    Route::get("getusersdepartments", [Departement_UtilisateurController::class, 'getusersdepartments']);


    //Utilisateur
    Route::post("addUtilisateur", [UtilisateurController::class, 'add']);
    Route::get("getallUtilisateur", [UtilisateurController::class, 'getall']);
    Route::delete("deleteutilisateur/{id}", [UtilisateurController::class, 'deleteutilisateur']);
    Route::get("getoneutilisateur/{id}", [UtilisateurController::class, 'getoneutilisateur']);
    Route::put("updateutilisateur/{id}", [UtilisateurController::class, 'editutilisateur']);
    Route::get("getonlytrashedutilisateur", [UtilisateurController::class, 'getOnlyTrashed']);
    Route::post("restoreutilisateur/{id}", [UtilisateurController::class, 'restoreutilisateur']);

    //Reset anf forgot Password
    Route::post("forgotPassword", [ForgotPasswordController::class, 'forgot']);
    Route::post("resetPassword", [ResetPasswordController::class, 'process']);
});
