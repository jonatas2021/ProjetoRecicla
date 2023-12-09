<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

class MapController extends Controller
{  
    public function map(Request $request)
    { 
        $geojson = file_get_contents(public_path('Pontos/pontos'));

        return response($geojson, 200)
            ->header('Content-Type', 'application/json');
    }    
}
