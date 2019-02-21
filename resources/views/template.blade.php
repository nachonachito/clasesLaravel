<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>@yield('titulo')</title>
    <link rel="stylesheet" href="/css/app.css">
  </head>

  <body>
    @include('partials/navbar')

    <div class="container">
      @yield('contenido')
    </div>
  </body>
</html>
