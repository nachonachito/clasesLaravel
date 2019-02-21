@extends('template')

@section('titulo', $actor->getFullName())

@section('contenido')
  <h2>Pagina de <b>{{ $actor->getFullName()}}</b></h2>
  <p><b>Rating:</b> {{ $actor->rating }}</p>
  <p><b>Favorite movie:</b> {{ $actor->favoriteMovie ? $actor->favoriteMovie->title : 'Sin pelicula favorita' }}</p>
@endsection
