<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\Company;
use App\Models\Point;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('delPoint', function($user,Point $point){
            if($user->adm){

                return true;
            }
            return $user->company -> id === $point -> company_id;
        });

        Gate::define('delCompany', function($user, Company $company){
    
            if($user->adm){

                return true;
            }
            return $user->id === $company->user_id;

        });
    }
}
