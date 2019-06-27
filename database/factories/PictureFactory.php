<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Folder;
use App\Picture;
use Faker\Generator as Faker;

$factory->define(Picture::class, function (Faker $faker) {

    $folders = Folder::all()->toArray();
    $folder = $faker->randomElement($folders);
    $folder_id = $folder['id'];
    $access = $folder['access'];
    $access = $faker->numberBetween($min = $access, $max = $access+1);


/*
    $linkFolderDir = '/images/PictureFolder/'.$folder_id;

    if (!Storage::exists($linkFolderDir))
    {
        Storage::makeDirectory($linkFolderDir, 0777);
    }
*/
    return [
        'folder_id' => $folder_id,
        'access' => $access,
        'link' => $faker->randomNumber($nbDigits = NULL, $strict = false),
        'name' => $faker->name,
        'info' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'alternative' => $faker->sentence($nbWords = 3, $variableNbWords = true)
    ];
});
