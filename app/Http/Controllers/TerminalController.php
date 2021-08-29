<?php

namespace App\Http\Controllers;

use App\Models\Terminal;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    public function add(Request $req)
    {
        $terminal = new Terminal();
        $terminal->Android_id = $req->Android_id;


        $result = $terminal->save();
        if ($result) {
            return ["Resultat" => "Etat terminal ajouté avec succés"];
        } else {
            return ["Resultat" => "Etat terminal non ajouté"];
        }
    }
    public function getAll()
    {
        $Terminaux = Terminal::get()->toJson(JSON_PRETTY_PRINT);
        return response($Terminaux, 200);
    }
    public function editTerminal(Request $request, int $id)
    {
        // if($id != null){
        //     Utilisateur::where('id', $id)->update($request->all());
        // }
        $terminal = Terminal::find($id);
        $terminal->nom = $request->input('nom');
        $terminal->save();

        return response()->json([
            'error' => false,
            'customer'  => $terminal,
        ], 200);
    }
    public function getnameTerminal($Android_id)
    {
        if (Terminal::where('Android_id', $Android_id)->exists()) {
            $Terminal = Terminal::where('Android_id', $Android_id)->first()->toJson(JSON_PRETTY_PRINT);
            return response($Terminal, 200);
        } else {
            return response()->json([
                "message" => "Etat not found"
            ], 404);
        }
    }
}
