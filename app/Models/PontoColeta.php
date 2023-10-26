<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PontoColeta extends Model
{
    use HasFactory;

    protected $fillable = [


        'nome',
        'complemento',
        'longetude',
        'latitude',
        'user_id',


    ];
}
