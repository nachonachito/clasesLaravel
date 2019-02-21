@extends('template')

@section('titulo', 'Editando la pelicula: ' . $movieToEdit->title )

@section('contenido')
  <h2>Editando la pelicula: {{ $movieToEdit->title }}</h2>
  <form action="/movies/{{ $movieToEdit->id }}" method="post">
    {{ csrf_field() }}
    {{ method_field('put') }}

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label>Titulo</label>
          <input class="form-control" type="text" name="title" placeholder="Ej: Harry Potter" value="{{ old('title', $movieToEdit->title) }}">
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label>Rating</label>
          <input class="form-control" type="text" name="rating" placeholder="Ej: 9.5" value="{{ old('rating', $movieToEdit->rating) }}">
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label>Awards</label>
          <input class="form-control" type="text" name="awards" placeholder="Ej: 3" value="{{ old('awards', $movieToEdit->awards) }}">
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label>Release date</label>

          <input class="form-control" type="date" name="release_date" value="{{ old('release_date', date('Y-m-d', strtotime($movieToEdit->release_date))) }}">
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label>Length</label>
          <input class="form-control" type="text" name="length" placeholder="Ej: 120" value="{{ old('length', $movieToEdit->length) }}">
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label>Genre</label>
          <select class="form-control" name="genre_id">
            <option value="">Elegi un genero</option>
            @foreach ($genres as $oneGenre)
              <option
                value="{{ $oneGenre->id }}"
                {{ old('genre_id', $movieToEdit->genre_id) == $oneGenre->id ? 'selected' : null }}
              >{{ $oneGenre->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-sm-12 text-center">
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>

    </div>
  </form>

  @if ($errors)
    <ul>
      @foreach ($errors->all() as $oneError)
        <li>{{ $oneError }}</li>
      @endforeach
    </ul>
  @endif
@endsection
