<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatTerminal extends Model
{
    use HasFactory;
    protected $table = 'etat_terminals';

    protected $fillable = [
        'Android_id',
        'NiveauDeBatterie',
        'Memoire',
        'Lattitude',
        'Longitude',
        'Fabriquant',
        'Modele',
        'VersionSE', 
       // 'valeur', 
        //'date_time'
    ];
    public $timestamp=false;

    public function terminal() {
        return $this->belongsTo(Terminal::class);
    }
}
