<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Company extends Model
{
    use HasFactory;

    protected $fillable = [


        'name',
        'cnpj',
        'user_id',


    ];

    public function owner(): BelongsTo
    {


        return $this->belongsTo(User::class, 'user_id');


    }

    function pontosColeta(): HasMany
    {
        return $this->hasMany(PontoColeta::class, 'company_id');
    }

}
