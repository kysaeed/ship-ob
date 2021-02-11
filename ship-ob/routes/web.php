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
})->name('top');

Route::prefix('world')->middleware(['auth'])->as('world.')->group(function() {
    Route::get('view/{idWorld}', 'ShipWorldController@index')->name('view');

    Route::post('move', 'ShipWorldController@ajaxMove')->name('move');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
