<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeEtat extends Model
{
    use HasFactory;
    protected $table = 'type_etats';

    protected $fillable = ['TerminalID', 'NiveauDeBatterie', 'Memoire', 'Lattitude', 'Longitude', 'Fabriquant', 'Modele', 'VersionSE'];
    public $timestamp=false;
}
