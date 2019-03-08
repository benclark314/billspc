@extends('layouts.app')

@section('content')
<div class='container'>
  <h1>{{$poke->pokemonName}}</h1>
  <div>
    {{$poke->description}}
  </div><br>
</div>
@endsection
