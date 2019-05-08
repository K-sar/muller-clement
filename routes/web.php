<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/photos', 'FolderController@index');

Route::get('/pictures', 'PictureController@index');

Route::get('/photos/{folder}', 'PictureController@show_folder')->where('folder', '[0-9]+');

Route::get('/photos/create_folder', 'FolderController@create')->name('folder_create');
Route::post('/photos', 'FolderController@store')->name('folder_store');
