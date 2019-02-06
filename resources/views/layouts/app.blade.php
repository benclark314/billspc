<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/app.css">
    <title>{{config('app.name', 'Bill\'s PC')}}</title>
    </head>
    <body>
          @include('partials._navbar')
          <div class="container">
            <div class="row">
              <div class="col-sm-12">
              </div>
                @yield('content')
            </div>
          </div>
    </body>
    <script type="text/JavaScript" src="js/app.js"></script>
</html>
