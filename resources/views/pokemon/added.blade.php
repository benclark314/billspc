@extends('layouts.app')

@section('content')
<div class='container'>
  <h1>{{$pokemon->pokemonName}}</h1>
  <div>
    <p>has been successfully added to your Pokemon.</p>
  </div><br>
</div>
@endsection
