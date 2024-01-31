<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;



class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Company/index', [

            'company' => Auth::user()->company


        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        $validated = $request->validate([
            'name' => ['required','string','max:100','min:3'],
            'cnpj' => ['required', 'cnpj'],
            'phone' =>['required', 'celular_com_ddd' ],
            'dataC' => ['required', 'date', 'after_or_equal:today'], 
        ]);

    
    
    
    
        Company::create([


            'name' => $request -> name,
            'cnpj' => $request -> cnpj,
            'phone' => $request -> phone,
            'dataC' => $request -> dataC,
            'user_id' => Auth::user()->id


        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {

        if(!Auth::user()->can('editCompany', $company))
        {
            abort(403);
        }

        return Inertia::render('Company/edit', [



            'company' => $company



        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {

        if(!Auth::user()->can('updateCompany', $company))
        {
            abort(403);
        }
        $validated = $request->validate([
            'name' => ['required','string','max:100','min:3'],
            'cnpj' => ['required', 'string', 'max:14', 'min:14'],
        ]);

        $company->update($request->all());

        return Redirect::route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {

            
        if(!Auth::user()->can('delCompany', $company))
        {
            abort(403);
        }
        $company -> delete();


    }
}
