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

    /* MEMBER ROUTES */
    Route::get('/leden', 'MemberController@showMembers');
    Route::get('/leden/{user}/edit', 'MemberController@editMember');
    Route::post('/leden/{user}/edit', 'MemberController@updateMember');
    Route::delete('/leden/{user}/delete', 'MemberController@deleteMember');

    /* GROCERY ROUTES */
    Route::get('/boodschappen', 'GroceryController@showGroceries');
    Route::get('/boodschappen/add', 'GroceryController@newGrocery');
    Route::post('/boodschappen/add', 'GroceryController@addGrocery');
    Route::get('/boodschappen/{grocery}/toggledone', 'GroceryController@toggleGrocery');
    Route::delete('/boodschappen/{grocery}/delete', 'GroceryController@deleteGrocery');
    Route::get('/boodschappen/{grocery}/edit', 'GroceryController@editGrocery');
    Route::post('/boodschappen/{grocery}/edit', 'GroceryController@updateGrocery');

    /* TAP ROUTES */
    Route::get('/taplijst', 'TapController@index');
    Route::post('/taplijst/save', 'TapController@saveEvent');
    Route::get('/taplijst/getTapList', 'TapController@getTapList');
    Route::delete('/taplijst/{event}/delete', 'TapController@deleteEvent');
    Route::post('/taplijst/{event}/update', 'TapController@updateEvent');
});
