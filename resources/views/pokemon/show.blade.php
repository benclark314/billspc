@extends('layouts.app')

@section('content')
  <h1>{{$pokemon->pokemonName}}</h1>
  <div>
    {{$pokemon->description}}
  </div>
@endsection
