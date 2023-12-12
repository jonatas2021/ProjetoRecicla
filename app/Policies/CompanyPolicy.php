<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Company;
class CompanyPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }
    public function delCompany(User $user, Company $company)
    {
        if($user->id === $company->user_id || $user->adm)
        {
            return true;
        }
        
        
    }
    /**
     * undocumented function
     *
     * @return void
     */
    public function editCompany(User $user, Company $company)
    {

        if($user->id === $company->user_id || $user->adm)
        {
            return true;
        }

    }
    
}
