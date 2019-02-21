<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
  public function movies()
  {
    return $this->belongsToMany(Movie::class);
  }

  public function favoriteMovie()
  {
    return $this->belongsTo(Movie::class);
  }

  public function getFullName()
  {
    return $this->first_name . ' ' . $this->last_name;
  }
}
