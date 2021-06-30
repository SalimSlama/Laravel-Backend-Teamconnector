<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\DepartementsUtilisateur;
use Illuminate\Http\Request;
Use \Carbon\Carbon;
class UtilisateurController extends BaseController
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
        // $utilisateur = new Utilisateur();
        // $utilisateur->nom = $req->nom;
        // $utilisateur->prenom = $req->prenom;
        // $utilisateur->adresse = $req->adresse;
        // $utilisateur->email = $req->email;

        // $result = $utilisateur->save();
        $result = Utilisateur::create(
            [
                'nom' => $req->nom,
                'prenom' => $req->prenom,
                'adresse' => $req->adresse,
                'email' => $req->email,
            ]
        );
        //var_dump($result);exit;
        $utilisateurdepartement = new DepartementsUtilisateur();
        $utilisateurdepartement->departement_id =$req->departement_id;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function getAll()
    {
        $utilisateur = Utilisateur::get()->toJson(JSON_PRETTY_PRINT);
        return response($utilisateur, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function editutilisateur(Request $request,int $id){
        // if($id != null){
        //     Utilisateur::where('id', $id)->update($request->all());
        // }
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utilisateur  $utilisateur
     * @return \Illuminate\Http\Response
     */
    public function deleteutilisateur(Request $request)
    {
        $id=$request->id;
        $utilisateur= Utilisateur::find($id);
        $utilisateur->delete();

        return $utilisateur;
        

    }

    public function getoneutilisateur(int $id)
    {
        return Utilisateur::find($id);
    }
}
