<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Terminal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'Android_id',
        'nom'
    ];
    public $timestamp = false;

    public function etats_terminal()
    {
        return $this->hasMany(EtatTerminal::class);
    }
}
