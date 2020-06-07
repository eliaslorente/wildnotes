<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Tag;
use App\Subject;

class Note extends Model
{

  public function user()
  {
      return $this->belongsTo(User::class);
  }

  public function subject()
  {
      return $this->belongsTo(Subject::class);
  }

  public function tags()
  {
      return $this->belongsToMany(Tag::class);
  }
}
