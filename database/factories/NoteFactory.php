<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Note;
use App\Subject;
use App\User;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
  $user = User::all()->random()->id;
    return [
        'name' => $faker->sentence(1,3),
        'content' => $faker->text,
        'user_id' => $user,
        'subject_id' => Subject::where('user_id', $user)->get()->random()->id
    ];
});
