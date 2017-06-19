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

/* FRONT OF WEBSITE */
Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/contact', 'ContactController@index');
Route::post('/contact', 'ContactController@postMessage');
Route::get('/nieuws', 'NewsController@index');
Route::get('/nieuws/{news}', 'NewsController@showNewsItem');
Route::get('/evenementen', 'EventController@index');
Route::get('/evenementen/{event}', 'EventController@showEvent');
Route::post('/voorverkoop/{presale}', 'PresaleController@buyTicket');
Route::get('/fotos', 'PhotoController@index');
Route::get('/fotos/{album}', 'PhotoController@showPhotoAlbum');
Route::get('/account/{user}', 'AccountController@index');
Route::get('/account/{user}/wijzigdetails', 'AccountController@editAccount');
Route::post('/account/{user}/wijzigdetails', 'AccountController@updateAccount');
Route::get('/account/{user}/wijzigpaswoord', 'AccountController@editPassword');
Route::post('/account/{user}/wijzigpaswoord', 'AccountController@updatePassword');
Route::get('/kernleden', 'MemberController@index');

Route::post('/pusherauth', 'PusherController@auth');


/* ADMIN ROUTES */
Route::group(['middleware' => ['subAdmin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'AdminController@index')->name('dashboard');

    /* SETTINGS ROUTES */
    Route::get('/websitesettings', 'AdminController@settings')->name('website settings');
    Route::get('/websitesettings/coverphoto', 'AdminController@editCoverPhoto')->name('cover foto aanpassen');
    Route::post('/websitesettings/coverphoto', 'AdminController@updateCoverPhoto');

    /* MEMBER ROUTES */
    Route::get('/leden', 'MemberController@showMembers')->name('leden');
    Route::get('/leden/{user}/edit', 'MemberController@editMember')->name('lid aanpassen');
    Route::post('/leden/{user}/edit', 'MemberController@updateMember');
    Route::delete('/leden/{user}/delete', 'MemberController@deleteMember');
    Route::get('/leden/zoeken', 'MemberController@searchMembers')->name('lid zoeken');
    Route::post('/leden/betaald', 'MemberController@paidMember');
    Route::get('/leden/add', 'MemberController@newMember')->name('lid aanmaken');
    Route::post('/leden/add', 'MemberController@addMember');
    Route::get('/kernleden', 'MemberController@showCoreMembers')->name('kernleden');
    Route::get('/kernleden/{core_member}/edit', 'MemberController@editCoreMember')->name('kernlid aanpassen');
    Route::post('/kernleden/{core_member}/edit', 'MemberController@updateCoreMember');

    /* GROCERY ROUTES */
    Route::get('/boodschappen', 'GroceryController@showGroceries')->name('boodschappenlijsten');
    Route::get('/boodschappen/add', 'GroceryController@newGrocery')->name('boodschappenlijst aanmaken');
    Route::post('/boodschappen/add', 'GroceryController@addGrocery');
    Route::get('/boodschappen/{grocery}/toggledone', 'GroceryController@toggleGrocery');
    Route::delete('/boodschappen/{grocery}/delete', 'GroceryController@deleteGrocery');
    Route::get('/boodschappen/{grocery}/edit', 'GroceryController@editGrocery')->name('boodschappenlijst aanpassen');
    Route::post('/boodschappen/{grocery}/edit', 'GroceryController@updateGrocery');
    Route::post('/boodschappen/done', 'GroceryController@itemDone');
    Route::post('/boodschappen/{grocery}/addItem', 'GroceryController@addItem');

    /* TAP ROUTES */
    Route::get('/taplijst', 'TapController@index')->name('taplijst');
    Route::post('/taplijst/save', 'TapController@saveEvent');
    Route::get('/taplijst/getTapList', 'TapController@getTapList');
    Route::delete('/taplijst/{event}/delete', 'TapController@deleteEvent');
    Route::post('/taplijst/{event}/update', 'TapController@updateEvent');
    Route::get('/taplijst/grafiek', 'TapController@graphic')->name('grafiek');
    Route::get('/taplijst/grafiek/data', 'TapController@getData');

    /* FILE UPLOAD ROUTES */
    Route::get('/verslagen', 'ReportController@showReports')->name('verslagen');
    Route::get('/verslagen/add', 'ReportController@newReport')->name('verslag aanmaken');
    Route::post('/verslagen/add', 'ReportController@addReport');
    Route::get('/verslagen/{report}/download', 'ReportController@downloadReport');
    Route::get('/verslagen/{kind_of_report}/all', 'ReportController@allReports')->name('soort verslag');
    Route::get('/verslagen/{report}/edit', 'ReportController@editReport')->name('verslag aanpassen');
    Route::post('/verslagen/{report}/edit', 'ReportController@updateReport');
    Route::delete('/verslagen/{report}/delete', 'ReportController@deleteReport');

    /* POLL ROUTES */
    Route::get('/polls', 'PollController@showPolls')->name('polls');
    Route::get('/polls/add', 'PollController@newPoll')->name('poll aanmaken');
    Route::post('/polls/add', 'PollController@addPoll');
    Route::post('/polls/{poll}/answer', 'PollController@addResult');
    Route::get('/polls/{poll}/results', 'PollController@getResults');
    Route::delete('/polls/{poll}/delete', 'PollController@deletePoll');
    Route::get('/polls/{poll}/edit', 'PollController@editPoll')->name('poll aanpassen');
    Route::post('polls/{poll}/edit', 'PollController@updatePoll');

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

    /* PRESALE ROUTES */
    Route::get('/voorverkoop', 'PresaleController@showPresale')->name('voorverkoop');
    Route::get('/voorverkoop/add', 'PresaleController@newPresale')->name('voorverkoop aanmaken');
    Route::post('/voorverkoop/add', 'PresaleController@addPresale');
    Route::delete('/voorverkoop/{presale}/delete', 'PresaleController@deletePresale');
    Route::get('/voorverkoop/{presale}/edit', 'PresaleController@editPresale')->name('voorverkoop aanpassen');
    Route::post('/voorverkoop/{presale}/edit', 'PresaleController@updatePresale');
    Route::get('/voorverkoop/{presale}', 'PresaleController@showDetails')->name('voorverkoop details');
    Route::get('/voorverkoop/{presale}/downloadPaidMember', 'PresaleController@downloadPaidMember');
    Route::get('/voorverkoop/{presale}/downloadNonPaidMember', 'PresaleController@downloadNonPaidMember');

    /* CONTACT ROUTES */
    Route::get('/contactBerichten', 'ContactController@showMessages')->name('contact berichten');
    Route::post('/contactBerichten/answered', 'ContactController@messageAnswered');

    /* RESET ROUTES */
    Route::get('/resetLeden', 'ResetController@index')->name('reset leden');
    Route::post('/resetLeden', 'ResetController@resetMembers');

    /* MAIL ROUTES */
    Route::get('/mailLeden', 'MailController@index')->name('mail leden');
    Route::post('/mailLeden', 'MailController@mailMembers');

});
