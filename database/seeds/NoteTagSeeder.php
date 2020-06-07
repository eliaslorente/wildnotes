<?php

use Illuminate\Database\Seeder;
use App\Note;
use App\Tag;

class NoteTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $notes = App\Note::all();
      
      App\Tag::all()->each(function ($tag) use ($notes) {
        $tag->notes()->attach(
            $notes->random(rand(1, 3))->pluck('id')->toArray()
        );
      });
    }
}
