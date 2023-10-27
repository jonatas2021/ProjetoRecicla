<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class PontoColeta extends Model
{
    use HasFactory;

    protected $fillable = [


        'nome',
        'complemento',
        'longitude',
        'latitude',
        'company_id',

    ];

    function company(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
