@extends('template')

@section('titulo', 'Listado de actores')

@section('contenido')
  <h2>Listado de actores</h2>
  <ul>
    @foreach ($allActors as $oneActor)
      <li>
        {{ $oneActor->getFullName() }} <a href="/actor/{{ $oneActor->id }}">[ver detalle del actor]</a> <br>
        @forelse ($oneActor->movies as $movie)
          <strong><a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a></strong> <br>
        @empty
          <i>No tiene peliculas asociadas</i> <br>
        @endforelse
        <br>
      </li>
    @endforeach
  </ul>
@endsection
