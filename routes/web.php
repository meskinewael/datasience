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



Route::get('/', 'FetchController@index');
// update database
Route::get('fetch', 'FetchController@fetchData');
//add synonymous
Route::post('store', 'SynonymousController@store')->name('synonymous.store');
//update synonymous
Route::post('update', 'SynonymousController@update')->name('synonymous.update');
//delete synonymous
Route::post('delete', 'SynonymousController@update')->name('synonymous.delete');