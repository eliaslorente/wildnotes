<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subject;
use App\User;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
      'name' => $faker->sentence(1,3),
      'description' => $faker->text,
      'user_id' => User::all()->random()->id
    ];
});
