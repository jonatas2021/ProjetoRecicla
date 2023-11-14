<?php

namespace App\Http\Controllers;

use App\Models\Adm;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Point;
class AdmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return Inertia::render('Adm/index',[

            'Points' => Point::all()



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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Adm $adm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Adm $adm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Adm $adm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Adm $adm)
    {
        //
    }
}
