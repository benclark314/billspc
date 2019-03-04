@extends('layouts.app')

@section('content')

    <form action="{{url('/pokemon')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
        <div class="form-group">
            <label for="upload-file">Upload</label>
            <input type="file" name="upload-file" class="form-control">
        </div>
        <input class="btn btn-success" type="submit" value="Upload File" name="submit">
    </form>

@endsection






<!-- @extends('layouts.app')

@section('content')
  <div class="container">
    <h1>Pokemon</h1> <br></br>
    @if(count($pokemon) >0)
    @foreach($pokemon as $poke)
      <div class="container">
        <div class="card card-body bg-light">
          <h3><a href="pokemon/{{$poke->id}}">{{$poke->pokemonName}}</a></h3>
          <small>Caught {{$poke->created_at}}</small>
        </div>
      </div> <br></br>
    @endforeach
    {{$pokemon->links()}}
  </div>
  @else
    <div class = "container">
      <h5>No pokemon found</h5>
    </div>
  @endif
@endsection -->
