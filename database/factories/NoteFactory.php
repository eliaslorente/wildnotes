<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Note;
use App\User;
use Faker\Generator as Faker;

$factory->define(Note::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1,3),
        'content' => $faker->text,
        'user_id' => User::all()->random()->id
    ];
});
