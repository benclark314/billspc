@extends('layouts.app')
@section('title', 'Homepage')

@section('content')
<div class="container">
  <!-- <div class="jumbotron text-center" style="background-image: url(images/ash-pokeball.jpg); background-size: 100%;"> -->
  <div class="jumbotron text-center">
    <h1 class="display-4">Welcome to Bill's PC</h1>
    <p class="lead">Accessed Bill's PC... <br></br> Accessed Pokemon Storage System...</p>
    <hr class="my-4">
    <p>When you change a Pokemon box, data will be saved. Is that okay?</p>
    <p><a class="btn btn-primary btn-lg" href="/login" role="button">Log in</a> <a class="btn btn-success btn-lg" href="/sign-in" role="button">Sign up</a>
  </div>
</div>
@endsection
