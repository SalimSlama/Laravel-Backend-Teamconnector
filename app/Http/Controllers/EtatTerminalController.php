<?php

namespace App\Http\Controllers;

use App\Models\EtatTerminal;
use App\Models\Terminal;
use Illuminate\Http\Request;

class EtatTerminalController extends BaseController
{
    //méthode d'ajout un élement
    public function add(Request $req)
    {
        $etatTerminal = new EtatTerminal();
        $etatTerminal->Android_id = $req->Android_id;
        $etatTerminal->NiveauDeBatterie = $req->NiveauDeBatterie;
        $etatTerminal->Memoire = $req->Memoire;
        $etatTerminal->Lattitude = $req->Lattitude;
        $etatTerminal->Longitude = $req->Longitude;
        $etatTerminal->Fabriquant = $req->Fabriquant;
        $etatTerminal->Modele = $req->Modele;
        $etatTerminal->VersionSE = $req->VersionSE;

        $result = $etatTerminal->save();
        if ($result) {
            return ["Resultat" => "Etat terminal ajouté avec succés"];
        } else {
            return ["Resultat" => "Etat terminal non ajouté"];
        }
    }
    //Méthode récupérer plusieurs élement
    public function getAll(Request $req)
    {
        $etatTerminal = EtatTerminal::get()->toJson(JSON_PRETTY_PRINT);
        return response($etatTerminal, 200);
    }
    public function gettwenty()
    {
        $etatTerminal = EtatTerminal::limit(20)->get()->toJson(JSON_PRETTY_PRINT);
        return response($etatTerminal, 200);
    }

    //Méthode récupérer un élement
    public function getOne($id)
    {
        if (EtatTerminal::where('id', $id)->exists()) {
            $etatTerminal = EtatTerminal::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($etatTerminal, 200);
        } else {
            return response()->json([
                "message" => "Etat not found"
            ], 404);
        }
    }
    public function getOneTerminal($Android_id)
    {
        if (EtatTerminal::where('Android_id', $Android_id)->exists()) {
            $etatTerminal = EtatTerminal::where('Android_id', $Android_id)->orderByDesc('id')->first()->toJson(JSON_PRETTY_PRINT);
            return response($etatTerminal, 200);
        } else {
            return response()->json([
                "message" => "Etat not found"
            ], 404);
        }
    }
    //Méthode mise à jour

    public function update(Request $request, $id)
    {
        if (EtatTerminal::where('id', $id)->exists()) {
            $etatTerminal = EtatTerminal::find($id);
            $etatTerminal->Android_id = is_null($request->Android_id) ? $etatTerminal->Android_id : $request->Android_id;
            $etatTerminal->NiveauDeBatterie = is_null($request->NiveauDeBatterie) ? $etatTerminal->NiveauDeBatterie : $request->NiveauDeBatterie;
            $etatTerminal->Memoire = is_null($request->Memoire) ? $etatTerminal->Memoire : $request->Memoire;
            $etatTerminal->Lattitude = is_null($request->Lattitude) ? $etatTerminal->Lattitude : $request->Lattitude;
            $etatTerminal->Longitude = is_null($request->Longitude) ? $etatTerminal->Longitude : $request->Longitude;
            $etatTerminal->Fabriquant = is_null($request->Fabriquant) ? $etatTerminal->Fabriquant : $request->Fabriquant;
            $etatTerminal->Modele = is_null($request->Modele) ? $etatTerminal->Modele : $request->Modele;
            $etatTerminal->VersionSE = is_null($request->VersionSE) ? $etatTerminal->VersionSE : $request->VersionSE;
            // $etatTerminal->update($etatTerminal->all());
            $etatTerminal->save();

            return response()->json([
                "message" => "records updated successfully"
            ], 200);
        } else {
            return response()->json([
                "message" => "Etat not found"
            ], 404);
        }
        /*$etatTerminal = TypeEtat::findOrFail($id);
      $etatTerminal->update($request->all());
      $result=$etatTerminal->save();
      if($result)
    {
        return ["Resultat"=>"Type Etat modifié avec succés"];
    }
    else
    {
        return ["Resultat"=>"Type Etat non modifié"];
    }*/
    }
    //Méthode suppression
    public function delete($id)
    {
        if (EtatTerminal::where('id', $id)->exists()) {
            $etatTerminal = EtatTerminal::find($id);
            $etatTerminal->delete();

            return response()->json([
                "message" => "records deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Etat not found"
            ], 404);
        }
    }
    public function getLast()
    {
        $etats = EtatTerminal::with('terminal')->orderByDesc('id')
            ->get()
            ->groupBy('Android_id');
        $numItems = count($etats);
        $i = 0;
        $data = array();
        foreach ($etats  as $etat) {
            if (++$i !== $numItems + 1) {
                //var_dump($etat[0]['Android_id']);
                $etat[0]['appareil'] = Terminal::firstWhere('Android_id', $etat[0]['Android_id']);
                $data[] = $etat[0];
            }
        }
        return response($data, 200);
    }
    public function getLastten()
    {
        $etats = EtatTerminal::orderByDesc('id')
            ->get()
            ->groupBy('Android_id');
        $numItems = count($etats);
        $i = 0;
        $data = array();
        foreach ($etats  as $etat) {
            if (++$i !== $numItems + 1) {
                $data[] = $etat[0];
            }
        }
        return response($data, 200);
    }
}
