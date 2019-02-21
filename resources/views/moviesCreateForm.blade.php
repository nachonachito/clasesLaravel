@extends('template')

@section('titulo', 'Crear pelicula')

@section('contenido')
  <h2>Crear una pelicula</h2>
  <form action="/movies/create" method="post">
    {{ csrf_field() }}

    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <label>Titulo</label>
          <input class="form-control" type="text" name="title" placeholder="Ej: Harry Potter" value="{{ old('title') }}">
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label>Rating</label>
          <input class="form-control" type="text" name="rating" placeholder="Ej: 9.5" value="{{ old('rating') }}">
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label>Awards</label>
          <input class="form-control" type="text" name="awards" placeholder="Ej: 3" value="{{ old('awards') }}">
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label>Release date</label>
          <input class="form-control" type="date" name="release_date" value="{{ old('release_date') }}">
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group">
          <label>Length</label>
          <input class="form-control" type="text" name="length" placeholder="Ej: 120" value="{{ old('length') }}">
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
                {{ old('genre_id') == $oneGenre->id ? 'selected' : null }}
              >{{ $oneGenre->name }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="col-sm-12">
        <div class="form-group">
          <label>Actors</label>
          <select class="form-control" name="actors[]" multiple>
            @foreach ($actors as $oneActor)
              <option value="{{ $oneActor->id }}">{{ $oneActor->getFullName() }}</option>
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
