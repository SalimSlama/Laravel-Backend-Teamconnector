<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $table = 'applications';

    protected $fillable = [
        'nom',
        'autorisations',
        'date_de_creation',
        'date_de_suppression'
    ];
    public $timestamp=false;
    use HasFactory;
}
