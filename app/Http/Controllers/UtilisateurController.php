<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Utilisateur;
use App\Models\DepartementsUtilisateur;
use Illuminate\Http\Request;
use \Carbon\Carbon;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $req)
    {
        $result = Utilisateur::create(
            [
                'nom' => $req->nom,
                'prenom' => $req->prenom,
                'adresse' => $req->adresse,
                'email' => $req->email,
            ]
        );
        $utilisateurdepartement = new DepartementsUtilisateur();
        $utilisateurdepartement->departement_id = $req->departement_id;
        $utilisateurdepartement->utilisateur_id = $result->id;
        $utilisateurdepartement->date_debut =  Carbon::now();
        $utilisateurdepartement->date_fin = Carbon::now();
        $utilisateurdepartement->save();

        if ($result) {
            return ["Resultat" => "Utilisateur ajouté avec succés"];
        } else {
            return ["Resultat" => "Utilisateur non ajouté"];
        }
    }

    public function getAll()
    {
        $utilisateur = Utilisateur::get()->toJson(JSON_PRETTY_PRINT);
        return response($utilisateur, 200);
    }
    public function editutilisateur(Request $request, int $id)
    {
        $utilisateur = Utilisateur::find($id);
        $utilisateur->nom = $request->input('nom');
        $utilisateur->prenom = $request->input('prenom');
        $utilisateur->email = $request->input('email');
        $utilisateur->adresse = $request->input('adresse');
        $utilisateur->save();

        return response()->json([
            'error' => false,
            'customer'  => $utilisateur,
        ], 200);
    }
    public function deleteutilisateur(Request $request)
    {
        $id = $request->id;
        $utilisateur = Utilisateur::find($id);
        $utilisateur->delete();

        return $utilisateur;
    }

    public function getoneutilisateur(int $id)
    {
        return Utilisateur::find($id);
    }
    public function restoreutilisateur(int $id)
    {
        Utilisateur::withTrashed()->find($id)->restore();
    }
    public function getOnlyTrashed()
    {
        $utilisateur = Utilisateur::onlyTrashed()->get()->toJson(JSON_PRETTY_PRINT);
        return response($utilisateur, 200);
    }
}
