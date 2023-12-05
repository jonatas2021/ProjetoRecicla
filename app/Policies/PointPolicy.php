<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Point;

class PointPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        
    }
    public function delPoint(User $user, Point $point)
    {
        if($user->company->id === $point->company_id || $user->adm)
        {
            return true;
        }
        
        
    }
    /**
     * undocumented function
     *
     * @return void
     */
    public function updatePoint(User $user, Point $point)
    {
        
        if($user->company->id === $point->company_id || $user->adm)
        {
            return true;
        }
    }
    
    public function editPoint(User $user, Point $point)
    {
        
        if($user->company->id === $point->company_id || $user->adm)
        {
            return true;
        }
    }
}
