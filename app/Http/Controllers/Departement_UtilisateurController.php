<?php

namespace App\Http\Controllers;

use App\Models\DepartementsUtilisateur;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class Departement_UtilisateurController extends Controller
{
    public function getAlluserdepartment()
    {
        $departement_utilisateur = DepartementsUtilisateur::get()->toJson(JSON_PRETTY_PRINT);
        return response($departement_utilisateur, 200);
    }
    public function getuserdepartment($id)
    {

        $utilisateur = Utilisateur::with("departement")->find($id);
        //Get many users with array id
        // $utilisateur = Utilisateur::with("departement")->WhereIn("id", $id)->get();
        return response()->json($utilisateur);
    }
    public function getusersdepartments()
    {

        $utilisateur = Utilisateur::with("departement")->all();
        //Get many users with array id
        // $utilisateur = Utilisateur::with("departement")->WhereIn("id", $id)->get();
        return response()->json($utilisateur);
    }
}
