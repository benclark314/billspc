@extends('layouts.app')

@section('content')
  <h1>Pokemon</h1>
  @if(count($pokemon) >0)
    @foreach($pokemon as $poke)
      <div class="container">
        <div class="card card-body bg-light">
          <h3>{{$poke->pokemonName}}</h3>
          <small>Caught {{$poke->created_at}}</small>
        </div>
      </div>
    @endforeach
  @else
    <div class = "container">
      <h5>No pokemon found</h5>
    </div>
  @endif
@endsection
