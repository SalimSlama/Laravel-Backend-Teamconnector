<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TypeEtat;

class TypeEtatController extends BaseController
{
  //méthode d'ajout un élement
    public function add(Request $req)
    {
        $typeetat = new TypeEtat;
        $typeetat->TerminalID = $req->TerminalID;
        $typeetat->NiveauDeBatterie = $req->NiveauDeBatterie;
        $typeetat->Memoire = $req->Memoire;
        $typeetat->Lattitude = $req->Lattitude;
        $typeetat->Longitude = $req->Longitude;
        $typeetat->Fabriquant = $req->Fabriquant;
        $typeetat->Modele = $req->Modele;
        $typeetat->VersionSE = $req->VersionSE;
        $result=$typeetat->save();
        if($result)
        {
            return ["Resultat"=>"Type Etat ajouté avec succés"];
        }
        else
        {
            return ["Resultat"=>"Type Etat non ajouté"];
        }
    }
      //Méthode récupérer plusieurs élement
    public function getAll() {
        $typeetat = TypeEtat::get()->toJson(JSON_PRETTY_PRINT);
    return response($typeetat, 200);
      }

    //Méthode récupérer un élement
    public function getOne($id) {
        if (TypeEtat::where('id', $id)->exists()) {
            $typeetat = TypeEtat::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($typeetat, 200);
          } else {
            return response()->json([
              "message" => "Type not found"
            ], 404);
          }
      }
    //Méthode mise à jour

    public function update(Request $request, $id) {
        if (TypeEtat::where('id', $id)->exists()) {
            $typeetat = TypeEtat::find($id);
            $typeetat->TerminalID = is_null($request->TerminalID) ? $typeetat->TerminalID : $request->TerminalID;
            $typeetat->NiveauDeBatterie = is_null($request->NiveauDeBatterie) ? $typeetat->NiveauDeBatterie : $request->NiveauDeBatterie;
            $typeetat->Memoire = is_null($request->Memoire) ? $typeetat->Memoire : $request->Memoire;
            $typeetat->Lattitude = is_null($request->Lattitude) ? $typeetat->Lattitude : $request->Lattitude;
            $typeetat->Longitude = is_null($request->Longitude) ? $typeetat->Longitude : $request->Longitude;
            $typeetat->Fabriquant = is_null($request->Fabriquant) ? $typeetat->Fabriquant : $request->Fabriquant;
            $typeetat->Modele = is_null($request->Modele) ? $typeetat->Modele : $request->Modele;
            $typeetat->VersionSE = is_null($request->VersionSE) ? $typeetat->VersionSE : $request->VersionSE;
           // $typeetat->update($typeetat->all());
            $typeetat->save();
    
            return response()->json([
              "message" => "records updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "Type not found"
            ], 404);
          }
          /*$typeetat = TypeEtat::findOrFail($id);
          $typeetat->update($request->all());
          $result=$typeetat->save();
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
    public function delete($id) {
        if(TypeEtat::where('id', $id)->exists()) {
            $typeetat = TypeEtat::find($id);
            $typeetat->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Type not found"
            ], 404);
          }
      }
}
