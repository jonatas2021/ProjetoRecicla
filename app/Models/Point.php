<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable = [


        'name',
        'complement',
        'longitude',
        'latitude',
        'company_id',

    ];
    
}
