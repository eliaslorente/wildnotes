<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tag;
use App\User;
use Faker\Generator as Faker;

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(1,3),
        'user_id' => User::all()->random()->id
    ];
});
