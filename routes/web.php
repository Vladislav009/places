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

Route::get('like/{id}', 'AssessmentController@likePlace')->name('assessment.like');
Route::get('dislike/{id}', 'AssessmentController@dislikePlace')->name('assessment.dislike');
Route::get('like_photo/{id}', 'AssessmentController@likePhoto')->name('assessment.like_photo');
Route::get('dislike_photo/{id}', 'AssessmentController@dislikePhoto')->name('assessment.dislike_photo');

Route::prefix('places')->group(function(){

	Route::get('/', 'PlaceController@index')->name('index');

	Route::name('place.')->group(function(){
		Route::get('create', 'PlaceController@form')->name('form');
		Route::post('create', 'PlaceController@create')->name('create');
		Route::get('{id}', 'PlaceController@show')->name('show');
	});

	Route::name('photo.')->group(function(){
		Route::prefix('photos')->group(function(){
			Route::get('add', 'PlaceController@addFormSelect')->name('form.select')->middleware('check');
			Route::post('add', 'PlaceController@storeSelect')->name('store.select');
		});
		Route::get('{id}/photos/add', 'PlaceController@showForm')->name('form');
		Route::post('{id}/photos/add', 'PlaceController@store')->name('store');
	});

});
