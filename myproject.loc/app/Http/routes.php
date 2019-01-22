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

/*Route::get('/', function () {
    return view('welcome');
});*/

use Illuminate\Support\Facades\DB;

Route::get('/', 'IndexController@index')->name('start');
Route::get('entants/main_info', 'IndexController@mainInfo')->name('mainInfo');
Route::get('entants', 'IndexController@showEntants')->name('showEntants'); 
Route::get('entants/additionalInfo/{entant}', 'IndexController@additional')->name('additional');
Route::get('entants/subjectEntants/{entant}', 'IndexController@subjectEntants')->name('subjectEntants');
Route::get('subjects/{direct}', 'IndexController@subjects')->name('subjects');

Route::get('entants/main_info/add', 'IndexController@addEntant')->name('addEntant');
Route::post('entants/main_info/add', 'IndexController@store')->name('entantStore');

Route::get('entants/main_info/edit/{entant}', 'IndexController@editMainEntant')->name('editMainEntant');
Route::post('entants/main_info/edit/{entant}', 'IndexController@entantEditStore')->name('entantEditStore');

Route::post('entants/additionalInfo/edit/{entant}', 'IndexController@entantEditAddiStore')->name('entantEditAddiStore');

Route::post('subjects/add', 'IndexController@DirStore')->name('DirStore');
Route::post('subjects/edit/{direct}', 'IndexController@DirEditStore')->name('DirEditStore');
Route::post('entants/subjectEntants/{entant}/{lenNameS}', 'IndexController@SubEditStore')->name('SubEditStore');

Route::delete('entants/main_info/delete/{entant}', function($entant) {
	//dump($entant);
	DB::table('entant')
		->where('entant.entant_id', '=', $entant)
		->delete();

	DB::table('contactInfo')
		->where('contactInfo.entant_id', '=', $entant)
		->delete();

	DB::table('directionOfEntant')
		->where('directionOfEntant.entant_id', '=', $entant)
		->delete();

	return redirect('entants');
})->name('entantDelete');


Route::delete('subjects/delete/{direct}', function($direct) {
	DB::table('direction')
		->where('direction.direction_id', '=', $direct)
		->delete();

	DB::table('directionOfEntant')
		->where('directionOfEntant.direction_id', '=', $direct)
		->delete();
	return redirect('/');
})->name('directDelete');



