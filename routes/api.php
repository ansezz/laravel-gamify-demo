<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['namespace' => 'API', 'middleware' => 'auth:api'], function () {

    Route::group(['middleware' => 'auth:api'], function () {
        Route::get('profile', 'UserControllers@profile');
        Route::get('profile/points', 'UserControllers@points');
        Route::get('profile/badges', 'UserControllers@badges');

        Route::get('achieve/point/{point}', 'GamifyController@achievePoint');
        Route::get('undo/point/{point}', 'GamifyController@undoPoint');
    });

    Route::get('points', 'GamifyController@points');
    Route::get('badges', 'GamifyController@badges');

});


