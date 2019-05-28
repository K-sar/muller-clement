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

Route::get('/galerie', 'FolderController@index');

Route::resource('/galerie/folder.picture', 'PictureController');

Route::resource('/galerie/folder', 'FolderController');

