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
    Route::group(['namespace' => 'Lecturer\\'], function() {

        // list all
        Route::get('/', ['as' => 'lecturer.courses', 'uses' => 'CourseController@index']);

        // builders
        Route::group(['prefix' => '/builder'], function() {
            // create
            Route::get('/', ['as' => 'courses.builder', 'uses' => 'CourseBuilderController@index']);
            Route::post('/', ['as' => 'courses.builder', 'uses' => 'CourseBuilderController@create']);

            // single
            Route::get('/{course}', ['as' => 'courses.builder.single', 'uses' => 'CourseBuilderController@show']);
            Route::post('/{course}', ['as' => 'courses.builder.single', 'uses' => 'CourseBuilderController@update']);

            Route::group(['prefix' => '/{course}/lessons'], function() {
                // list all
                Route::get('/', ['as' => 'courses.builder.lessons', 'uses' => 'LessonBuilderController@index']);

                // create
                Route::get('/create/{module}', ['as' => 'courses.builder.lessons.create', 'uses' => 'LessonBuilderController@create']);
                Route::post('/create/{module}', ['as' => 'courses.builder.lessons.create', 'uses' => 'LessonBuilderController@store']);

                // show
                Route::get('/{lesson}', ['as' => 'courses.builder.lessons.single', 'uses' => 'LessonBuilderController@show']);
                Route::post('/{lesson}', ['as' => 'courses.builder.lessons.single', 'uses' => 'LessonBuilderController@update']);
            });
        });

        // show
        Route::get('/{course}', ['as' => 'lecturer.courses.single', 'uses' => 'CourseController@show']);

        // delete
        Route::get('/{course}/delete', ['as' => 'lecturer.courses.delete', 'uses' => 'CourseController@destroy']);
        Route::get('/{course}/delete/{module}', ['as' => 'lecturer.courses.modules.delete', 'uses' => 'CourseController@destroy_module']);
        Route::get('/{course}/delete/lesson/{lesson}', ['as' => 'lecturer.courses.modules.lessons.delete', 'uses' => 'CourseController@destroy_lesson']);
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

            // delete
            Route::get('/{discipline}/delete', ['as' => 'admin.site.disciplines.delete', 'uses' => 'DisciplineController@destroy']);
        });
    });
});
