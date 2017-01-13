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

Route::group(['prefix' => '/courses', 'middleware' => ['auth']], function() {
    Route::group(['namespace' => 'Lecturer\\', 'middleware' => ['auth']], function() {
        Route::get('/builder', ['as' => 'courses.builder', 'uses' => 'CourseBuilderController@index']);
        Route::post('/builder', ['as' => 'courses.builder', 'uses' => 'CourseBuilderController@create']);
    });
});

Route::group(['prefix' => '/admin', 'namespace' => 'Admin\\', 'middleware' => ['auth']], function() {
    Route::group(['prefix' => '/site', 'namespace' => 'Site\\'], function() {
        Route::group(['prefix' => '/disciplines', 'namespace' => 'Disciplines\\'], function() {
            // list all
            Route::get('/', ['as' => 'admin.site.disciplines', 'uses' => 'DisciplineController@index']);

            // create
            Route::get('/create', ['as' => 'admin.site.disciplines.create', 'uses' => 'DisciplineController@create']);
            Route::post('/create', ['as' => 'admin.site.disciplines.create', 'uses' => 'DisciplineController@store']);

            // edit
            Route::get('/{discipline}', ['as' => 'admin.site.disciplines.edit', 'uses' => 'DisciplineController@show']);
            Route::post('/{discipline}', ['as' => 'admin.site.disciplines.edit', 'uses' => 'DisciplineController@update']);
        });
    });
});
