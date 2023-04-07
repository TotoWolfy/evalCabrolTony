<?php

use Illuminate\Support\Facades\Route;

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
    return view('liste_recettes');
})->name('liste');

Route::get('/recherche', function () {
    return view('resultat_recherche');
})->name('recherche');

Route::get('/ajout', function () {
    return view('ajout_recette');
})->name('ajout');