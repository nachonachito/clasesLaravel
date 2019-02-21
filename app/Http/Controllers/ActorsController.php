<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;

class ActorsController extends Controller
{
  public function actorsList()
  {
    $allActors = Actor::all();

    return view('actorsList', compact('allActors'));
  }

  public function actorDetail($id)
  {
    $actor = Actor::find($id);
    return view('actorDetail', compact('actor'));
  }
}
