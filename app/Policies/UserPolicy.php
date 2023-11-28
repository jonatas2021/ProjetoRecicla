<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    /**
     * undocumented function
     *
     * @return void
     */
    public function isAdm(User $user)
    {
        return Auth::user()->adm != null;
    }
    
}
