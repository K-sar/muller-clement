<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Folder::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'access' => Int::random(1),
        'name' => $faker->slug,
        'remember_token' => Str::random(10),
    ];
});
