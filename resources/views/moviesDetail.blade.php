@extends('template')

@section('titulo',  $oneMovie->title)

@section('contenido')
  <h2>Detalle de pelicula: {{ $oneMovie->title }}</h2>
  <p>Rating: {{ $oneMovie->rating }}</p>
  <p>Awards: {{ $oneMovie->awards }}</p>
  <p>Length: {{ round($oneMovie->length / 60) }}hs</p>
  <p>Genre: {{ $oneMovie->genre ? $oneMovie->genre->name : 'Sin genero' }}</p>
  @if (count($oneMovie->actors) > 0)
    <h5>Listado de actores</h5>
    <ul>
      @foreach ($oneMovie->actors as $oneActor)
        <li>{{ $oneActor->getFullName() }} <a href="/actor/{{ $oneActor->id }}">[ver detalle del actor]</a></li>
      @endforeach
    </ul>
  @endif

  <a href="/movies">volver al listado de peliculas</a> <br><br>
  <form action="/movies/{{ $oneMovie->id }}" method="post">
    {{ csrf_field() }}
    {{ method_field('delete') }}
    <button type="submit" class="btn btn-danger">borrar esta pelicula</button>
  </form> <br>
  <a href="/movies/{{ $oneMovie->id }}/edit" class="btn btn-warning">editar esta peli</a>
@endsection
