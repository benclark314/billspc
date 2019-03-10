@extends('layouts.app')

@section('content')
  <div class="container">
    <h1>My Pokemon</h1>
    <h5><a href="{{ route('mypokemon.showJSON')}}">Show as JSON</a></h5><br>
    @if(count($mypokemon) >0)
    @foreach($mypokemon as $pok)
      <div class="container">
        <div class="card card-body bg-success">
          <h3><a href="mypokemon/{{$pok->id}}"><font color="004c97">{{$pok->pokemonName}}</font></a></h3>
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
