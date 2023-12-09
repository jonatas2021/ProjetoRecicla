<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;



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
            'cnpj' => ['required', 'string', 'max:14', 'min:14'],
        ]);

        Company::create([


            'name' => $request -> name,
            'cnpj' => $request -> cnpj,
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

        return Inertia::render('Company/edit', [



            'company' => $company



        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {

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

        if (Gate::denies('delCompany', $company)) {
            
           abort(403); 
        }
        $company -> delete();


    }
}
