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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/test', 'AdminController@test');

Route::group(['middleware' => ['subAdmin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/leden', 'AdminController@showMembers');
    Route::get('/leden/{user}/edit', 'AdminController@editMember');
    Route::post('/leden/{user}/edit', 'AdminController@updateMember');
    Route::delete('/leden/{user}/delete', 'AdminController@deleteMember');
    Route::get('/boodschappen', 'AdminController@showGroceries');
    Route::get('/boodschappen/add', 'AdminController@newGrocery');
    Route::post('/boodschappen/add', 'AdminController@addGrocery');
    Route::get('/boodschappen/{grocery}/toggledone', 'AdminController@toggleGrocery');
    Route::delete('/boodschappen/{grocery}/delete', 'AdminController@deleteGrocery');
    Route::get('/boodschappen/{grocery}/edit', 'AdminController@editGrocery');
    Route::post('/boodschappen/{grocery}/edit', 'AdminController@updateGrocery');
});
