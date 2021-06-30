<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartementsUtilisateur extends Model
{
    protected $fillable = [
        'departement_id',
        'utilisateur_id',
        'date_debut',
        'date_fin'
    ];
    use HasFactory;
}
