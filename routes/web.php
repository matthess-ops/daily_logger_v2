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


// Route::group(['prefix' => 'client'], function() {
//     Route::get('/', 'ClientController@index')->name('Client.index');
//     Route::get('/create', 'ClientController@create')->name('Client.create');
//     Route::post('/create', 'ClientController@store')->name('Client.store');
//     Route::get('/{user}/show', 'ClientController@show')->name('Client.show');
//     Route::get('/{user}/edit', 'ClientController@edit')->name('Client.edit');
//     Route::patch('/{user}/update', 'ClientController@update')->name('Client.update');
//     Route::delete('/{user}/delete', 'ClientController@destroy')->name('Client.destroy');
// });


Route::get('testpolicy/', 'KomopController@index')->middleware('auth');


Route::get('client/', 'TestController@index')->name('test.client')->middleware('auth');
Route::get('mentor/', 'TestController@mentor')->name('test.mentor')->middleware('auth');
Route::get('admin/', 'TestController@admin')->name('test.admin')->middleware('auth');

Route::get('testpage/', 'TestController@testpage')->name('test.testpage');

Route::get('/clientsa', 'ClientController@indexxx')->name('Client.index')->middleware('auth');



// Route::group(['prefix' => 'client'], function() {
//     Route::get('/', 'ClientController@index')->name('Client.index')->middleware('auth');
//     Route::get('/create', 'ClientController@create')->name('Client.create')->middleware('auth');
//     Route::post('/create', 'ClientController@store')->name('Client.store')->middleware('auth');
//     Route::get('/{user}/show', 'ClientController@show')->name('Client.show')->middleware('auth');
//     Route::get('/{user}/edit', 'ClientController@edit')->name('Client.edit')->middleware('auth');
//     Route::patch('/{user}/update', 'ClientController@update')->name('Client.update')->middleware('auth');
//     Route::delete('/{user}/delete', 'ClientController@destroy')->name('Client.destroy')->middleware('auth');
// });
