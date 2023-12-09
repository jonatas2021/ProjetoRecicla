<?php


use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\AdmController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Point;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', ['can'=>[
        'isAdm' => Auth::user()->can('isAdm', User::class)
        ]
    ]);

})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::resource('/company', CompanyController::class);
    Route::resource('/point', PointController::class);
    Route::resource('/adm', AdmController::class)->middleware('can:isAdm, App\Models\User');
});



    Route::get('/map', function (){

        return Inertia::render('Map/Mapa',['Points' => Point::all()]);
    })->name('map');
    Route::get('/pontos.geojson', function () {
        $path = public_path('pontos.geojson'); 
        $content = file_get_contents($path);
    
        return new Response($content, 200, [
            'Content-Type' => 'application/json',
        ]);
    });
    







require __DIR__.'/auth.php';
