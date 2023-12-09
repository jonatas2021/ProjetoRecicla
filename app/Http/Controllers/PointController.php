<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Gate;
class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Point/index', [

            'Points' => Auth::user()->company->point

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



        $user = Auth::user(); 
        $this->authorize('isCompany', $user);

        $validated = $request->validate([
            'name' => ['required','string','max:100','min:3'],
            'complement' => ['required', 'string', 'max:14', 'min:14'],
            'latitude' => ['required', 'string', 'max:25', 'min:10'],
            'longitude' => ['required', 'string', 'max:25', 'min:10'],
        ]);

        Point::create([


            'name' => $request -> name,
            'complement' => $request -> complement,
            'latitude' => $request -> latitude,
            'longitude' => $request -> longitude,
            'company_id' => Auth::user()->company->id,
            'status' => '0'
            //'status' => $request -> status


        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Point $point)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Point $point)
    {
        $adm = Auth::user()->adm;
        return Inertia::render('Point/edit', [

            'Points' => $point,
            'Adm' =>$adm

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Point $point)
    {

        if(Auth::user()->adm != null){

            $validated = $request->validate([
                'name' => ['required','string','max:100','min:3'],
                'complement' => ['required', 'string', 'max:25', 'min:10'],
                'latitude' => ['required', 'string', 'max:25', 'min:10'],
                'longitude' => ['required', 'string', 'max:25', 'min:10'],
            ]);

            $point->update([


                'name' => $request->name,
                'complement'=> $request->complement,
                'longitude'=> $request->longitude,
                'latitude'=> $request->latitude,
                'status'=>"1"



            ]);



            return Redirect::route('adm.index');

        }else {

            $point->update($request->all());


        }


        return Redirect::route('point.index');

    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(Point $point)
    {



        $this->authorize('delPoint', $point);


        
        $point->delete(); 

    }
    
    

}
