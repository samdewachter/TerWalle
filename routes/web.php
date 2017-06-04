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
    Route::get('/', 'AdminController@index')->name('dashboard');

    /* MEMBER ROUTES */
    Route::get('/leden', 'MemberController@showMembers')->name('leden');
    Route::get('/leden/{user}/edit', 'MemberController@editMember')->name('lid aanpassen');
    Route::post('/leden/{user}/edit', 'MemberController@updateMember');
    Route::delete('/leden/{user}/delete', 'MemberController@deleteMember');
    Route::get('/leden/zoeken', 'MemberController@searchMembers')->name('lid zoeken');
    Route::post('/leden/betaald', 'MemberController@paidMember');

    /* GROCERY ROUTES */
    Route::get('/boodschappen', 'GroceryController@showGroceries')->name('boodschappenlijsten');
    Route::get('/boodschappen/add', 'GroceryController@newGrocery')->name('boodschappenlijst aanmaken');
    Route::post('/boodschappen/add', 'GroceryController@addGrocery');
    Route::get('/boodschappen/{grocery}/toggledone', 'GroceryController@toggleGrocery');
    Route::delete('/boodschappen/{grocery}/delete', 'GroceryController@deleteGrocery');
    Route::get('/boodschappen/{grocery}/edit', 'GroceryController@editGrocery')->name('boodschappenlijst aanpassen');
    Route::post('/boodschappen/{grocery}/edit', 'GroceryController@updateGrocery');

    /* TAP ROUTES */
    Route::get('/taplijst', 'TapController@index')->name('taplijst');
    Route::post('/taplijst/save', 'TapController@saveEvent');
    Route::get('/taplijst/getTapList', 'TapController@getTapList');
    Route::delete('/taplijst/{event}/delete', 'TapController@deleteEvent');
    Route::post('/taplijst/{event}/update', 'TapController@updateEvent');

    /* FILE UPLOAD ROUTES */
    Route::get('/verslagen', 'ReportController@showReports')->name('verslagen');
    Route::get('/verslagen/add', 'ReportController@newReport')->name('verslag aanmaken');
    Route::post('/verslagen/add', 'ReportController@addReport');
    Route::get('/verslagen/{report}/download', 'ReportController@downloadReport');
    Route::get('/verslagen/{kind_of_report}/all', 'ReportController@allReports')->name('soort verslag');
    Route::get('/verslagen/{report}/edit', 'ReportController@editReport')->name('verslage aanpassen');
    Route::post('/verslagen/{report}/edit', 'ReportController@updateReport');
    Route::delete('/verslagen/{report}/delete', 'ReportController@deleteReport');

    /* POLL ROUTES */
    Route::get('/polls', 'PollController@showPolls')->name('polls');
    Route::get('/polls/add', 'PollController@newPoll')->name('poll aanmaken');
    Route::post('/polls/add', 'PollController@addPoll');
    Route::post('/polls/{poll}/answer', 'PollController@addResult');
    Route::get('/polls/{poll}/results', 'PollController@getResults');

    /* EVENT ROUTES */
    Route::get('/evenementen', 'EventController@showEvents')->name('evenementen');
    Route::get('/evenementen/facebook', 'EventController@getFacebookEvents');
    Route::post('/evenementen/publish', 'EventController@publishEvent');
    Route::get('/evenementen/add', 'EventController@newEvent')->name('evenement aanmaken');
    Route::post('/evenementen/add', 'EventController@addEvent');
    Route::delete('/evenementen/{event}/delete', 'EventController@deleteEvent');
    Route::get('/evenementen/{event}/edit', 'EventController@editEvent')->name('evenement aanpassen');
    Route::post('/evenementen/{event}/edit', 'EventController@updateEvent');
    Route::get('/evenementen/zoeken', 'EventController@searchEvents')->name('evenement zoeken');

    /* PHOTO ROUTES */
    Route::get('/albums', 'PhotoController@showAlbums')->name('albums');
    Route::get('/albums/add', 'PhotoController@newAlbum')->name('album aanmaken');
    Route::post('/albums/add', 'PhotoController@addAlbum');
    Route::delete('/album/{album}/delete', 'PhotoController@deleteAlbum');
    Route::get('/album/{album}', 'PhotoController@showAlbum')->name('album aanpassen');
    Route::post('/album/{album}/edit', 'PhotoController@updateAlbum');
    Route::delete('/foto/{photo}/delete', 'PhotoController@deletePhoto');
    Route::get('/album/{album}/fotos/add', 'PhotoController@newPhotos')->name("foto's toevoegen");
    Route::post('/album/{album}/fotos/add', 'PhotoController@addPhotos');
    Route::get('/albums/zoeken', 'PhotoController@searchAlbums')->name('album zoeken');

    /* NEWS ROUTES */
    Route::get('/nieuwtjes', 'NewsController@showNews')->name('nieuwtjes');
    Route::get('/nieuwtjes/add', 'NewsController@newNews')->name('nieuwtje aanmaken');
    Route::post('/nieuwtjes/add', 'NewsController@addNews');
    Route::get('/nieuwtjes/{news}/edit', 'NewsController@editNews')->name('nieuwtje aanpassen');
    Route::post('/nieuwtjes/{news}/edit', 'NewsController@updateNews');
    Route::delete('/nieuwtjes/{news}/delete', 'NewsController@deleteNews');
    Route::post('/nieuwtjes/publish', 'NewsController@publishNews');
    Route::get('/nieuwtjes/zoeken', 'NewsController@searchNews')->name('nieuwtje zoeken');

    /* TEST ROUTE */
    Route::get('/test', 'PhotoController@test');
});
