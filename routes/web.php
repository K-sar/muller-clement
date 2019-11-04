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

Route::get('/', 'BaseController@index')->name('/');
Route::resource('/base', 'BaseController');


Route::get('/galerie', 'FolderController@index');

Route::resource('/galerie/folder', 'FolderController');
Route::resource('/galerie/folder.picture', 'PictureController');

Route::get('/galerie/pictures', 'PictureController@index')->name('picture.index');
Route::get('/galerie/tag/{tag}', 'PictureController@index')->name('tag.show');
Route::get('/galerie/tag/{tag}/picture/{picture}', 'PictureController@showTag')->name('tag.picture.show');
Route::get('/galerie/pictures/{picture}', 'PictureController@showFromAll')->name('picture.show');

Route::get('/galerie/FTP', 'PictureController@FTP')->name('FTP');
Route::get('/galerie/FTPAdd/{FTP}', 'PictureController@FTPAdd')->name('FTPAdd');
Route::post('/galerie/FTP/{FTP}', 'PictureController@FTPStore')->name('FTPStore');
Route::get('/galerie/FTPDelete/{FTP}', 'PictureController@FTPDelete')->name('FTPDelete');

Route::get('/galerie/folder/{folder}/slider', 'PictureController@slider')->name('picture.slider');
Route::post('/galerie/folder/{folder}/picture/{picture}/slider', 'PictureController@sliderUpdate')->name('picture.slider.update');

Route::get('/galerie/folder/{folder}/ordre', 'PictureController@ordre')->name('picture.ordre');
Route::post('/galerie/folder/{folder}/picture/{picture}/ordre', 'PictureController@ordreUpdate')->name('picture.ordre.update');

Route::get('/galerie//ordre', 'FolderController@ordre')->name('folder.ordre');
Route::post('/galerie/folder/{folder}/ordre', 'FolderController@ordreUpdate')->name('folder.ordre.update');


Route::get('/console', function(){
    return \Alkhachatryan\LaravelWebConsole\LaravelWebConsole::show();
});

Route::resource('/portfolio', 'PortfolioController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/CV', function () {
    return view('CV');
})->name('CV');
