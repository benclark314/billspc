@extends('layouts.app')

@section('content')
<div class='container'>
  <h1>{{$pokemon->pokemonName}}</h1>
  @if($caught)
    <div>
      <p>is already in your Pokedex!</p>
    </div><br>
  @else
    <div>
      <p>has been successfully added to your Pokedex.</p>
    </div><br>
  @endif
</div>
@endsection
