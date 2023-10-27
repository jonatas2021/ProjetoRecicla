<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use App\Models\PontoColeta;
use Illuminate\Http\Request;

class PontoColetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('PontoColeta/index', [

            'PontosColeta' => Auth::user()->company->pontosColeta

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
        PontoColeta::create([

            'nome' => $request -> nome,
            'complemento' => $request -> complemento,
            'longitude' => $request -> longitude,
            'latitude' => $request -> latitude,
            'company_id' => Auth::user()->company->id

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PontoColeta $pontoColeta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PontoColeta $pontoColeta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PontoColeta $pontoColeta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PontoColeta $pontoColeta)
    {
        $pontoColeta -> delete();
    }
}
