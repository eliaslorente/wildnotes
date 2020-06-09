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
      $user = App\User::all()->random();
      $notes = App\Note::where('user_id', $user->id)->get();

      App\Tag::where('user_id', $user->id)->each(function ($tag) use ($notes) {
        $tag->notes()->attach(
            $notes->random(rand(1, 3))->pluck('id')->toArray()
        );
      });
    }
}
