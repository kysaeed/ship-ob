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
    Route::get('view/{idWorld}', 'ShipWorldController@index')->where('idWorld', '[0-9]+')->name('view');

    Route::post('move/{idWorld}', 'ShipWorldController@ajaxMove')->where('idWorld', '[0-9]+')->name('move');
    Route::post('update/{idWorld}', 'ShipWorldController@ajaxUpdate')->where('idWorld', '[0-9]+')->name('update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('home/world/create', 'HomeController@create')->name('home.world.create');
