<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => '/account', 'namespace' => 'Accounts\\', 'middleware' => ['auth']], function() {
    Route::get('/settings', ['as' => 'account.settings', 'uses' => 'SettingsController@index']);
    Route::post('/settings', ['as' => 'account.settings', 'uses' => 'SettingsController@update']);
});
