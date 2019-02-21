<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Genre;
use App\Actor;

class MoviesController extends Controller
{
  public function moviesList()
  {
    // $movies = ["Titanic", "Spiderman", "Aquaman", "La vida es bella", "Superman", "Batman"];
    $movies = \App\Movie::all();
    return view("moviesList", compact("movies"));
  }

  public function findMovie($id)
  {
    // $movies = ["Titanic", "Spiderman", "Aquaman", "La vida es bella", "Superman", "Batman"];
    // $oneMovie = $movies[$id];
    $oneMovie = \App\Movie::find($id);
    return view("moviesDetail", compact("oneMovie"));
  }

  public function showForm()
  {
    $genres = Genre::all();
    $actors = Actor::all();
    return view("moviesCreateForm", compact('genres', 'actors'));
  }

  public function store(Request $form)
  {
    //dd($form->all());
    // Validacion del formulario
    $form->validate([
      'title' => 'required',
      'rating' => ['required', 'numeric', 'min:1', 'max:10'],
      'awards' => ['required', 'integer'],
      'release_date' => 'required',
      'length' => ['required', 'integer'],
      'genre_id' => 'required',
    ], [
      'required' => 'El campo :attribute es obligatorio',
      'numeric' => 'El campo :attribute debe ser un numero',
      'integer' => 'El campo :attribute debe ser un numero entero',
      'min' => [
          'numeric' => 'El campo :attribute debe ser como minimo :min.',
        ],
      'max' => [
          'numeric' => 'El campo :attribute debe ser como maximo :max.',
        ],
    ]);

    // Guardado de la pelicula
    $movie = new \App\Movie;

    $movie->title = $form->title;
    $movie->rating = $form->rating;
    $movie->awards = $form->awards;
    $movie->length = $form->length;
    $movie->release_date = $form->release_date;
    $movie->genre_id = $form->genre_id;

    $movie->save();

    foreach ($form->actors as $oneActor) {
      $movie->actors()->attach($oneActor);
      $movie->save();
    }

    return redirect('/movies');
  }

  public function removeMovie($id)
  {
    $movieToDelete = \App\Movie::find($id);

    $movieToDelete->delete();

    return redirect('/movies');
  }

  public function showEditForm($id)
  {
    $movieToEdit = \App\Movie::find($id);
    $genres = Genre::all();
    return view('moviesEditForm', compact('movieToEdit', 'genres'));
  }

  public function updateMovie(Request $form, $id)
  {
    $movieToEdit = \App\Movie::find($id);

    // Validacion del formulario
    $form->validate([
      'title' => 'required',
      'rating' => ['required', 'numeric', 'min:1', 'max:10'],
      'awards' => ['required', 'integer'],
      'release_date' => 'required',
      'length' => ['required', 'integer'],
    ], [
      'required' => 'El campo :attribute es obligatorio',
      'numeric' => 'El campo :attribute debe ser un numero',
      'integer' => 'El campo :attribute debe ser un numero entero',
      'min' => [
          'numeric' => 'El campo :attribute debe ser como minimo :min.',
        ],
      'max' => [
          'numeric' => 'El campo :attribute debe ser como maximo :max.',
        ],
    ]);

    // Guardado de la pelicula
    $movieToEdit->title = $form->title;
    $movieToEdit->rating = $form->rating;
    $movieToEdit->awards = $form->awards;
    $movieToEdit->length = $form->length;
    $movieToEdit->release_date = $form->release_date;

    $movieToEdit->update();

    return redirect('/movies');
  }
}
