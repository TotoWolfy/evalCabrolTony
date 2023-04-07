<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Recette;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function (Request $request) {
    return response()->json(["message" => "Bienvenue dans l'API de gestion de recettes"],200);
   });

   Route::get('/recettes', function (Request $request) {

    $recette = Recette::select("titre","ingredients","duree","photo")->get();
    return response()->json($recette);
});

Route::get('/recettes?search={ingredients}', function (Request $request, $ingredients) {

    $search = Recette::select("titre","ingredients","duree","photo")->where('ingredients', 'LIKE', '%'.$ingredients.'%')->get();
    return response()->json($search);
});

Route::delete('/recettes/{id}', function ($id) {
    $recette = Recette::find($id);
    if (!$recette) {
        return response()->json(["status" => 0], 404);
    }
    $ok = $recette->delete();

    if ($ok){
        return response()->json(["status" => 1], 200);
    } 
    
    else{
        return response()->json(["status" => 0], 400);
    }
});
