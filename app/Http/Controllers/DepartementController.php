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
        $id = $request->id;
        $dep = Departement::find($id);
        $dep->delete();

        return $dep;
    }
    public function editdepartement(Request $request, int $id)
    {
        $dep = Departement::find($id);
        $dep->nom = $request->input('nom');
        $dep->save();

        return response()->json([
            'error' => false,
            'customer'  => $dep,
        ], 200);
    }
    public function getonedepartement(int $id)
    {
        return Departement::find($id);
    }
    public function restoredepartement(int $id)
    {
        Departement::withTrashed()->find($id)->restore();
    }
    public function getOnlyTrashed()
    {
        $departement = Departement::onlyTrashed()->get()->toJson(JSON_PRETTY_PRINT);
        return response($departement, 200);
    }
}
