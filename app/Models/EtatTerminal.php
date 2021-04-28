<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatTerminal extends Model
{
    use HasFactory;
    protected $table = 'etat_terminals';

    protected $fillable = [
        'nom_etat', 
        'valeur', 
        'date_time'
    ];
    public $timestamp=false;
}
