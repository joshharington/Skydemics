<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::group(['namespace' => 'API\\', 'middlware' => ['auth:api']], function() {
    Route::group(['prefix' => '/builders', 'namespace' => 'Builders\\'], function() {
        Route::group(['prefix' => '/lessons', 'namespace' => 'Lessons\\'], function() {
            Route::post('/', ['as' => 'api.builders.lessons.modules.create', 'uses' => 'ModuleController@store']);
            Route::post('/update', ['as' => 'api.builders.lessons.modules.update', 'uses' => 'ModuleController@update']);
            Route::post('/update/order', ['as' => 'api.builders.lessons.modules.update.order', 'uses' => 'ModuleController@update_order']);
        });
    });

});