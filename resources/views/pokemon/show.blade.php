@extends('layouts.app')

@section('content')
<div class='container'>
  <h1>{{$pokemon->pokemonName}}</h1>
  <div>
    {{$pokemon->description}}
  </div>
</div>  
@endsection
