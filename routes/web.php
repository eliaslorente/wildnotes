<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
  Route::prefix('escaner')->group(function () {
    Route::get('/', 'ScanController@index')->name('scan');
    Route::post('/', 'ScanController@annotateImage');
    Route::post('/crear', 'ScanController@store');
  });
});

Route::group(['middleware' => ['auth']], function () {
  Route::prefix('notes')->group(function () {
    Route::get('/', 'NoteController@index')->name('notes');
    Route::post('/', 'NoteController@filter')->name('notes.filter');
    Route::get('/edit/{id}', 'NoteController@edit')->name('notes.edit');
    Route::post('/update/{id}', 'NoteController@update');
    Route::get('/delete/{id}', 'NoteController@destroy')->name('notes.delete');
    Route::get('/{id}', 'NoteController@show')->name('notes.show');
  });
});
