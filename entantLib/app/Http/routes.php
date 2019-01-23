<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('begin');

Route::get('/begin', 'IndexController@index')->name('start');

Route::get('entants', 'IndexController@showEntants')->name('showEntants'); 
//Route::get('entants/main_info', 'IndexController@mainInfo')->name('mainInfo');

Route::get('entants/main_info', 'EntantsController@index')->name('showMainInfo');
Route::get('entants/main_info/add', 'EntantsController@create')->name('createEntant');
Route::post('entants/main_info/add', 'EntantsController@store')->name('storeEntant');
