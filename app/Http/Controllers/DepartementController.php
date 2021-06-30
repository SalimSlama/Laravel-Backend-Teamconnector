<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    public function add(Request $req)
    {
        $departement = new Departement();
        $departement->nom = $req->nom;


        $result = $departement->save();
        if ($result) {
            return ["Resultat" => "Département ajouté avec succés"];
        } else {
            return ["Resultat" => "Département non ajouté"];
        }
    }
    //Méthode récupérer plusieurs élement
    public function getAll()
    {
        $departement = Departement::get()->toJson(JSON_PRETTY_PRINT);
        return response($departement, 200);
    }

    public function deletedep(Request $request)
    {
        $id=$request->id;
        $dep= Departement::find($id);
        $dep->delete();

        return $dep;
    }
}
