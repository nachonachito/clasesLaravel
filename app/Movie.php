<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
  protected $fillable = ['title', 'awards', ' length', 'rating', 'release_date', 'genre_id'];

  public function genre()
  {
    return $this->belongsTo(Genre::class);
  }

  public function actors()
  {
    return $this->belongsToMany(Actor::class);
  }
}
