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
    return redirect('places');
});

Route::get('/places', 'PlaceController@index');
Route::get('places/create', 'PlaceController@form')->name('form');
Route::post('places/create', 'PlaceController@create')->name('create');
Route::get('places/{id}', 'PlaceController@show')->name('show');
Route::get('places/{id}/photos/add', 'PlaceController@showForm')->name('showForm');
Route::post('places/{id}/photos/add', 'PlaceController@store');
