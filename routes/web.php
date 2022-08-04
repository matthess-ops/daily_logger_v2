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

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'client'], function() {

    Route::get('/', 'ClientController@index')->name('client.index')->middleware('auth');
    Route::get('/create', 'ClientController@create')->name('client.create')->middleware('auth');
    Route::post('/create', 'ClientController@store')->name('client.store')->middleware('auth');
    Route::get('/{id}/show', 'ClientController@show')->name('client.show')->middleware('auth');
    Route::patch('/{id}/update', 'ClientController@update')->name('client.update')->middleware('auth');
    Route::delete('/{id}/delete', 'ClientController@destroy')->name('client.destroy')->middleware('auth');
    Route::get('/{id}/edit', 'ClientController@edit')->name('client.edit')->middleware('auth');

});

Route::group(['prefix' => 'activities'], function() {

    Route::get('/', 'ActivitiesController@index')->name('activities.index')->middleware('auth');
    Route::get('/create', 'ActivitiesController@create')->name('activities.create')->middleware('auth');
    Route::post('/create', 'ActivitiesController@store')->name('activities.store')->middleware('auth');
    // no show id needed
    Route::get('/show', 'ActivitiesController@show')->name('activities.show')->middleware('auth');
    Route::patch('/{id}/update', 'ActivitiesController@update')->name('activities.update')->middleware('auth');
    Route::delete('/{id}/delete', 'ActivitiesController@destroy')->name('activities.destroy')->middleware('auth');
    Route::get('/{id}/edit', 'ActivitiesController@edit')->name('activities.edit')->middleware('auth');

});


Route::group(['prefix' => 'password'], function() {

    Route::get('/{id}/edit', 'PasswordController@edit')->name('password.edit')->middleware('auth');
    Route::patch('/{id}/update', 'PasswordController@update')->name('password.update')->middleware('auth');

});
