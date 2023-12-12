<?php

namespace App\Http\Controllers;

use App\Models\Point;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::user()->can('isCompany', Auth::user()))
        {
            return to_route('company.index') -> with(['msg' => 'teste']);
            //return redirect()->route('company.index');
             
        
        }
        
        
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

       if(Auth::user()->can('isCompany', Auth::user())) 
        $this->authorize('isCompany', Auth::user());
        $validated = $request->validate([
            'name' => ['required','string','max:100','min:3'],
            'complement' => ['required', 'string', 'max:50  ', 'min:10'],
            'link' => ['required', 'string', 'min:50']
        ]);
        
        $cord = Str::between($request->link, '@', ',');
        $latitude = Str::beforeLast($cord, ',');
        $longitude = Str::afterLast($cord, ',');
        Point::create([

            
            'name' => $request -> name,
            'complement' => $request -> complement,
            'latitude' => $latitude,
            'longitude' => $longitude,
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

    /**V
     * Show the form for editing the specified resource.
     */
    public function edit(Point $point)
    {
        $adm = Auth::user()->adm;
        if(Auth::user()->can('editPoint', $point))
        {

            abort(403);
        }
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
        $user = Auth::user();

        if ($request->user()->can('updatePoint',$point)){
            if($request->user()->can('isAdm', $user)){

                $point->update([


                    'name' => $request->name,
                    'complement'=> $request->complement,
                    'longitude'=> $request->longitude,
                    'latitude'=> $request->latitude,
                    'status'=>"1"



                ]);

                function criarEstruturaGeoJson($points) {
                    $features = [];
                
                    foreach ($points as $point) {
                        if ($points->status === 0) {
                            
                            $feature = [
                                "type" => "Feature",
                                "properties" => (object) [],
                                "geometry" => [
                                    "coordinates" => [$point->longitude, $point->latitude],
                                    "type" => "Point"
                                ]
                            ];
                    
                            $features[] = $feature;
                        }
                    }
                
                    $estrutura = [
                        "features" => $features,
                        "type" => "FeatureCollection"
                    ];
                
                    return json_encode($estrutura, JSON_PRETTY_PRINT);
                }
                
                $points = Point::all();
                
                $jsonDados = criarEstruturaGeoJson($points);
                
                $caminhoArquivo = public_path('pontos.geojson');
                File::put($caminhoArquivo, $jsonDados);
        
            }else{

                $point->update($request->all());
            }
        
            abort(403); 
        }

    }

     /**
     * Remove the specified resource from storage.
     */
    public function destroy(Point $point)
    {

        if(!Auth::user()->can('delPoint',$point))
        {

            abort(403);


        } 

        $point->delete(); 

    }
    
    

}
