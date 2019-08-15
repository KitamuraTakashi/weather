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

    Route::group(['middleware' => ['api']], function () {
        Route::get('weathers/{year}/{month}/{day}', 'Api\WeathersController@archive');

        Route::apiResources([
            'weathers' => 'Api\WeathersController',
            'areas'    => 'Api\AreasController'
        ]);
    });
