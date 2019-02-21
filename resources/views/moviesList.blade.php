@extends('template')

@section('titulo', 'Listado de peliculas')

@section('contenido')
  <h2>Listado de peliculas</h2>
  <ul>
    @foreach ($movies as $oneMovie)
      <li><a href="/movies/{{ $oneMovie->id }}"> {{ $oneMovie->title }} </a></li>
    @endforeach
  </ul>
@endsection
