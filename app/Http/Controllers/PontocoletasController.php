<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Pontocoletas;
use Illuminate\Http\Request;

class PontocoletasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        Pontocoletas::create([
            'nome' => $request->nome,
            'status' => $request->status,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'user_id' => Auth::user()->id
        ]);
        return redirect('/dashboard');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pontocoletas $pontocoletas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pontocoletas = Pontocoletas::findOrFail($id);
        return view('edit-point', ['points' => $pontocoletas]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $PointofColeta = Pontocoletas::findOrFail($id);
        $PointofColeta ->nome = $request ->nome;
        $PointofColeta ->latitude = $request ->latitude;
        $PointofColeta ->longitude = $request ->longitude;
        $PointofColeta ->update();
        return redirect('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pontocoletas)
    {
        $pontocoletas = Pontocoletas::findOrfail($pontocoletas)->delete();
        return redirect()->back();
    }
}
