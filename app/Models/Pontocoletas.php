<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pontocoletas extends Model
{
    use HasFactory;


    protected $fillable = [
        'status',
        'latitude',
        'longitude',
        'user_id'
    
    ];


    public function empresa(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
