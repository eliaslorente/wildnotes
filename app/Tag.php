<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Note;

class Tag extends Model
{
    public function notes()
    {
        return $this->belongsToMany(Note::class);
    }
}
