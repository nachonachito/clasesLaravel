@extends('template')

@section('titulo', $genre->name)

@section('contenido')
  <h2>Genero: {{ $genre->name }}</h2>
  <ul>
    @foreach ($genre->movies as $oneMovie)
      <li> {{ $oneMovie->title }} <a href="/movies/{{ $oneMovie->id }}">[ver detalle]</a> </li>
    @endforeach
  </ul>
@endsection
