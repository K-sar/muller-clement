<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Folder;
use App\Picture;
use Faker\Generator as Faker;

$factory->define(Picture::class, function (Faker $faker) {
    $folders = Folder::pluck('id')->toArray();
    return [
        'folder_id' => $faker->randomElement($folders),
        'access' => $faker->randomDigit,
        'link' => $faker->url,
        'name' => $faker->name,
        'info' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'alternative' => $faker->sentence($nbWords = 3, $variableNbWords = true),
        'slug' => $faker->slug,
    ];
});
