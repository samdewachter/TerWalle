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

    /* FILE UPLOAD ROUTES */
    Route::get('/verslagen', 'ReportController@showReports');
    Route::get('/verslagen/add', 'ReportController@newReport');
    Route::post('/verslagen/add', 'ReportController@addReport');
    Route::get('/verslagen/{report}/download', 'ReportController@downloadReport');
    Route::get('/verslagen/{kind_of_report}/all', 'ReportController@allReports');
    Route::get('/verslagen/{report}/edit', 'ReportController@editReport');
    Route::post('/verslagen/{report}/edit', 'ReportController@updateReport');
    Route::delete('/verslagen/{report}/delete', 'ReportController@deleteReport');

    /* POLL ROUTES */
    Route::get('/polls', 'PollController@showPolls');
    Route::get('/polls/add', 'PollController@newPoll');
    Route::post('/polls/add', 'PollController@addPoll');
    Route::post('/polls/{poll}/answer', 'PollController@addResult');
    Route::get('/polls/{poll}/results', 'PollController@getResults');

    /* EVENT ROUTES */
    Route::get('/evenementen', 'EventController@showEvents');
    Route::get('/evenementen/facebook', 'EventController@getFacebookEvents');
});
