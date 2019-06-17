<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');
Route::get('upload', 'LibraryController@book_upload_view');
Route::post('book_upload_process', 'LibraryController@upload_book');
Route::get('downloadZip','LibraryController@zip_download');
Route::get('fileDownload','LibraryController@downloadFile');
Route::get('view_library', 'LibraryController@view_library');
Route::post('search_book', 'LibraryController@search_book');
Route::get('search_book', 'LibraryController@search_book');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
