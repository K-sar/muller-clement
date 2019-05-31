<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Folder;
use Faker\Generator as Faker;

$factory->define(Folder::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'access' => $faker->randomDigit
    ];
});
