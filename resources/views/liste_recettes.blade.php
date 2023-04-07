@extends('index')
@section('section')
<h3>{{ "Liste des recettes" }}</h3>

<table class="table table-striped">
  <tr><th>Photo</th><th>Titre</th><th>Ingrédients</th> <th>Durée moyenne</th></tr>
  @foreach ($recettes as $recette)
  <tr><td><img src="{{$recette->photo}}" alt="{{$recette->titre}}"></td><td>{{$recette->titre}}</td><td>{{$recette->ingredients}}</td><td>{{$recette->duree}}</td>
  
  @endforeach
  </table>
@stop