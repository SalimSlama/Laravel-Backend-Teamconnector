<?php

namespace App\Http\Controllers;

use App\Models\EtatTerminal;
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
        $Terminaux = Terminal::get();
        foreach ($Terminaux as $R) {
            $etat = EtatTerminal::where('Android_id', $R->Android_id)->orderByDesc('id')->first();
            $R->etats = $etat;
        }
        return response($Terminaux, 200);
    }
    public function editTerminal(Request $request, $Android_id)
    {
        $terminal = Terminal::whereAndroidId($Android_id)->first();
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
