<?php

namespace App;

use App\Note;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
  public function notes()
  {
      return $this->hasMany(Note::class);
  }
}
