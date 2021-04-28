<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;
    protected $fillable = [
        'NomTerminal',
        'TerminalID', 
        'NiveauDeBatterie', 
        'Memoire', 
        'Lattitude', 
        'Longitude', 
        'Fabriquant', 
        'Modele', 
        'VersionSE'
    ];
    public $timestamp=false;
}
