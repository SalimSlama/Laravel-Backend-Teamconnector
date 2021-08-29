<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departement extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nom'
    ];
    public $timestamp = false;

    public function utilisateur()
    {
        return $this->belongsToMany(Utilisateur::class, 'departements_utilisateurs');
    }
}
