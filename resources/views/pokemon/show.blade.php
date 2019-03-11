@extends('layouts.app')

@section('content')
<div class='container'>
  <h1>{{$poke->pokemonName}}</h1>
  <div>
    {{$poke->description}}
  </div><br>
  @auth
    <a href="../mypokemon/create/{{$poke->id}}">Add to My Pokemon</a>
  @endauth
</div>
@endsection
