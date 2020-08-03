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

Route::get      ('/tasks',                 'TaskController@index');
Route::get      ('/tasks/create',          'TaskController@create');
Route::post     ('/tasks/create',          'TaskController@store');
Route::get      ('/tasks/{userid}/edit',   'TaskController@edit');
Route::put      ('/tasks/{userid}/edit',   'TaskController@update');
Route::delete   ('/tasks/{userid}/delete', 'TaskController@destroy');