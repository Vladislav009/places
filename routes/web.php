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

Route::get('rating', 'AssessmentController@rating')->name('assessment.rating');

Route::prefix('places')->group(function(){

	Route::get('/', 'PlaceController@index')->name('index');

	Route::name('place.')->group(function(){
		Route::get('create', 'PlaceController@form')->name('form');
		Route::post('create', 'PlaceController@create')->name('create');
		Route::get('{id}', 'PlaceController@show')->name('show');
	});

	Route::name('photo.')->group(function(){
		Route::prefix('photos')->group(function(){
			Route::get('add', 'PhotoController@addFormSelect')->name('form.select')->middleware('check');
			Route::post('add', 'PhotoController@storeSelect')->name('store.select');
		});
		Route::get('{id}/photos/add', 'PhotoController@showForm')->name('form');
		Route::post('{id}/photos/add', 'PhotoController@store')->name('store');
	});

	Route::name('assessment.')->group(function(){
		Route::get('like/{id}', 'PlaceController@likePlace')->name('like');
		Route::get('dislike/{id}', 'PlaceController@dislikePlace')->name('dislike');
		Route::get('like_photo/{id}', 'PhotoController@likePhoto')->name('like_photo');
		Route::get('dislike_photo/{id}', 'PhotoController@dislikePhoto')->name('dislike_photo');
	});

});
