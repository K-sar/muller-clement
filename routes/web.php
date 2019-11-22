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
//----------------------------------------------------------------------------------------------------------------------Base
Route::get('/', 'BaseController@index')->name('/');
Route::resource('/base', 'BaseController');


//----------------------------------------------------------------------------------------------------------------------CV
Route::get('/CV', 'CVController@CV')->name('CV');
Route::get('/CV/backoffice', 'CVController@backOffice')->name('CV.backoffice');
//--------------------------------------------------------------------------------------------------------------------Xp
Route::get('/CV/xp/create', 'CVController@createXp')->name('xp.create');
Route::post('/CV/xp', 'CVController@storeXp')->name('xp.store');
Route::get('/CV/xp/{xp}/edit', 'CVController@editXp')->name('xp.edit');
Route::post('/CV/xp/{xp}', 'CVController@updateXp')->name('xp.update');
Route::delete('/CV/xp/{xp}', 'CVController@deleteXp')->name('xp.delete');
//-------------------------------------------------------------------------------------------------------------------PDF
Route::get('/CV/PDF/create', 'CVController@createPdf')->name('pdf.create');
Route::post('/CV/PDF', 'CVController@storePdf')->name('pdf.store');
Route::get('/CV/PDF/{pdf}/edit', 'CVController@editPdf')->name('pdf.edit');
Route::post('/CV/PDF/{pdf}', 'CVController@updatePdf')->name('pdf.update');
Route::delete('/CV/PDF/{pdf}', 'CVController@deletePdf')->name('pdf.delete');


//----------------------------------------------------------------------------------------------------------------------Portfolio
Route::resource('/portfolio', 'PortfolioController');


//----------------------------------------------------------------------------------------------------------------------galerie
Route::get('/galerie', 'FolderController@index');
//---------------------------------------------------------------------------------------------------------------Folders
Route::resource('/galerie/folder', 'FolderController');
Route::resource('/galerie/folder.picture', 'PictureController');
//--------------------------------------------------------------------------------------------------------------Pictures
Route::get('/galerie/pictures', 'PictureController@index')->name('picture.index');
Route::get('/galerie/tag/{tag}', 'PictureController@index')->name('tag.show');
Route::get('/galerie/tag/{tag}/picture/{picture}', 'PictureController@showTag')->name('tag.picture.show');
Route::get('/galerie/pictures/{picture}', 'PictureController@showFromAll')->name('picture.show');
//-------------------------------------------------------------------------------------------------------------------FTP
Route::get('/galerie/FTP', 'PictureController@FTP')->name('FTP');
Route::get('/galerie/FTPAdd/{FTP}', 'PictureController@FTPAdd')->name('FTPAdd');
Route::post('/galerie/FTP/{FTP}', 'PictureController@FTPStore')->name('FTPStore');
Route::get('/galerie/FTPDelete/{FTP}', 'PictureController@FTPDelete')->name('FTPDelete');
//-------------------------------------------------------------------------------------------------------Ordre et Slider
Route::get('/galerie/folder/{folder}/slider', 'PictureController@slider')->name('picture.slider');
Route::post('/galerie/folder/{folder}/picture/{picture}/slider', 'PictureController@sliderUpdate')->name('picture.slider.update');

Route::get('/galerie/folder/{folder}/ordre', 'PictureController@ordre')->name('picture.ordre');
Route::post('/galerie/folder/{folder}/picture/{picture}/ordre', 'PictureController@ordreUpdate')->name('picture.ordre.update');

Route::get('/galerie/ordre', 'FolderController@ordre')->name('folder.ordre');
Route::post('/galerie/folder/{folder}/ordre', 'FolderController@ordreUpdate')->name('folder.ordre.update');


//----------------------------------------------------------------------------------------------------------------------Autres
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/console', function(){
    return \Alkhachatryan\LaravelWebConsole\LaravelWebConsole::show();
});

