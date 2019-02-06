<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('pages.index')}}">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('pages.about')}}">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contact.show')}}">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('pages.pokemonlist')}}">Pokemon list</a>
      </li>
    </ul>
  </div>
</nav>




<!-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css">

        <title>{{config('app.name', 'Bill\'s PC')}}</title>
    </head>

    <script type="text/JavaScript" src="js/app.js"></script>
</html> -->
