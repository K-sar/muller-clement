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

Route::get('/galerie/pictures', 'PictureController@index')->name('picture.index');

Route::get('/galerie/pictures/{picture}', 'PictureController@showFromAll')->name('picture.show');

Route::resource('/galerie/folder', 'FolderController');

Route::resource('/galerie/folder.picture', 'PictureController');

Route::get('/galerie/tag/{tag}', 'PictureController@index')->name('tag.show');

Route::get('/galerie/tag/{tag}/picture/{picture}', 'PictureController@showTag')->name('tag.picture.show');



Route::resource('/portfolio', 'PortfolioController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
