<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Utilisateur extends Model
{
    protected $table = 'utilisateurs';

    protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'email',
        'departement_id'
    ];
    public $timestamp = false;

    use HasFactory;
    use SoftDeletes;

    public function departement()
    {
        return $this->belongsToMany(Departement::class, 'departements_utilisateurs');
    }
}
