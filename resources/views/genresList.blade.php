@extends('template')

@section('titulo', 'Listado de generos')

@section('contenido')
  <h2>Listado de generos</h2>
  <ul>
    @foreach ($allGenres as $oneGenre)
      <li>{{ $oneGenre->name }} <a href="/genres/{{ $oneGenre->id }}"> [ver peliculas] </a></li>
    @endforeach
  </ul>
@endsection
