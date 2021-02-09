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

Route::get('/', function() {
    return view('top');
});

Route::prefix('home')->group(function() {
    Route::get('/', 'ShipWorldController@index');
    Route::post('move', 'ShipWorldController@ajaxMove')->name('world.move');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
