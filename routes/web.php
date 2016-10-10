<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('beans', 'BeansController');
Route::resource('roasts', 'RoastsController');
Route::resource('brews', 'BrewsController');
Route::resource('tastings', 'TastingsController');

Route::get('reports', 'ReportsController@index')->name('reports.index');
