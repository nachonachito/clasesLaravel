<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;

class GenresController extends Controller
{

  /*
  en la variable allgenres, estamos almacenando la consulta a la base de datos a la tabla genres. esta variable se la pasamos a la vista a traves de la funcion compact.
  */
  public function genresList()
  {
    $allGenres = Genre::all();
    return view('genresList', compact('allGenres'));
  }

  public function moviesByGenre($id)
  {
    $genre = Genre::find($id);
    return view('moviesByGenreList', compact('genre'));
  }
}
