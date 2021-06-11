<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom'
    ];
    public $timestamp=false;

    public function etats_terminal(){
        return $this->hasMany(EtatTerminal::class);
    }
}
