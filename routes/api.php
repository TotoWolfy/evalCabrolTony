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

Route::get(' /api/recettes?search={titre}', function (Request $request, $titre) {

    $recette = Recette::select("titre","ingredients","duree","photo")->where('titre', 'LIKE', '%'.$titre.'%')->get();
    return response()->json($recette);
});
