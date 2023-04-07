<?php

use Illuminate\Support\Facades\Route;
use App\Models\Recette;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('accueil');
});

Route::get('/liste', function () {
    $recettes = Recette::get();
    return view('liste_recettes',["recettes"=>$recettes]);
})->name('liste');
// <td><a href="{{ route('modifier', ['id' => $recette->titre]) }}"><button type="button" class="btn btn-warning" id="{{$recette->titre}}">Modifier</button></a></td>
//   <td><a href="{{ route('supprimer', ['id' => $recette->titre]) }}"><button type="button" class="btn btn-danger" id="{{$recette->titre}}">Supprimer</button></a></td>

Route::get('/recherche', function () {
    return view('resultat_recherche');
})->name('recherche');

Route::get('/ajouter', function () {
    return view('ajout_recette');
})->name('ajouter');

Route::post('/ajout', function (Request $request) {
    $titre = $request->input('titre');
    $ingredients = $request->input('ingredients');
    $duree = $request->input('duree');
    $photo = $request->input('photo');
    
DB::table('recettes')->insert(['titre' => $titre,'ingredients' => $ingredients,
    'duree' => $duree,'photo' => $photo ]);
return view('confirm_ajout');
})->name('ajout');