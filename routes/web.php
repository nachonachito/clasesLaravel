<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Route::get('/saludar', function () {
  return "Hola Nacho";
});

Route::get('/saludar2/{nombre}/{apellido?}', function ($nombre, $apellido = "Sanchez") {
  return "Hola " . $nombre . " " . $apellido;
});

// Route::get()
// Route::post() // siempre vienen de un formulario

Route::get("/movies", "MoviesController@moviesList");
Route::get("/movies/create", "MoviesController@showForm");
Route::post("/movies/create", "MoviesController@store");
Route::get("/movies/{id}", "MoviesController@findMovie");
Route::delete("/movies/{id}", "MoviesController@removeMovie");
Route::get("/movies/{id}/edit", "MoviesController@showEditForm");
Route::put("/movies/{id}", "MoviesController@updateMovie");

Route::get('/genres', 'GenresController@genresList');
Route::get('/genres/{id}', 'GenresController@moviesByGenre');

Route::get('/actors', 'ActorsController@actorsList');
Route::get('/actor/{id}', 'ActorsController@actorDetail');
