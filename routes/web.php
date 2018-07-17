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
Route::get('/places', 'PlaceController@index')->name('index');
Route::prefix('places')->group(function(){
	Route::get('create', 'PlaceController@form')->name('formPlace');
	Route::post('create', 'PlaceController@create')->name('create');
	Route::get('photos/add', 'PlaceController@addFormSelect')->name('formPhotoSelect')->middleware('check');
	Route::post('photos/add', 'PlaceController@storeSelect')->name('storePhotoSelect');
	Route::get('{id}', 'PlaceController@show')->name('show');
	Route::get('{id}/photos/add', 'PlaceController@showForm')->name('formPhoto');
	Route::post('{id}/photos/add', 'PlaceController@store')->name('storePhoto');
});
