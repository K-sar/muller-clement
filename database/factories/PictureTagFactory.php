<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\PictureTag;
use App\Picture;
use App\Tag;
use Faker\Generator as Faker;

$factory->define(PictureTag::class, function (Faker $faker) {

    $pictures = Picture::pluck('id')->toArray();
    $picture_id = $faker->randomElement($pictures);

    $tags = Tag::pluck('id')->toArray();
    $tag_id = $faker->randomElement($tags);

    return [
        'picture_id' => $picture_id,
        'tag_id' => $tag_id,
    ];
});
