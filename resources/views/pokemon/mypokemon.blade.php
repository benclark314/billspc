@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Pokemon</h1> <br>

    @if(count($mypokemon) >0)
    @foreach($mypokemon as $pok)
      <div class="container">
        <div class="card card-body bg-medium">
          <h3><a href="mypokemon/{{$pok->id}}">{{$pok->pokemonName}}</a></h3>
          <small>Caught {{$pok->created_at}}</small>
        </div>
      </div><br>
    @endforeach
  </div>
  @else
    <div class = "container">
      <h5>No pokemon found</h5>
    </div>
  @endif
@endsection
