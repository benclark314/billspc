@extends('layouts.app')
@section('content')
  <div class="container">
    <h1>Pokemon</h1> <br>
    @if(count($pokemon) >0)
    @foreach($pokemon as $poke)
      <div class="container">
        <div class="card card-body bg-light">
          <h3><a href="pokemon/{{$poke->id}}">{{$poke->pokemonName}}</a></h3>
          <small>Caught {{$poke->created_at}}</small>
            @auth
              <a href="trainerPokemonController/{{$poke->id}}">Add to My Pokemon</a>
            @endauth
        </div>
      </div><br>
    @endforeach
    {{$pokemon->links()}}
  </div>
  @else
    <div class = "container">
      <h5>No pokemon found</h5>
    </div>
  @endif
@endsection
