<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EtatTerminal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'etat_terminals';

    protected $fillable = [
        'Android_id',
        'NiveauDeBatterie',
        'Memoire',
        'Lattitude',
        'Longitude',
        'Fabriquant',
        'Modele',
        'VersionSE'
    ];
    public $timestamp = false;

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }
}
