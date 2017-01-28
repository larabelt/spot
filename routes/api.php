<?php

use Ohio\Spot;

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

Route::group([
    'prefix' => 'api/v1',
    'middleware' => ['web', 'auth', 'api']
],
    function () {

        # addresses
        Route::get('addresses/{id}', Spot\Http\Controllers\Api\AddressesController::class . '@show');
        Route::put('addresses/{id}', Spot\Http\Controllers\Api\AddressesController::class . '@update');
        Route::delete('addresses/{id}', Spot\Http\Controllers\Api\AddressesController::class . '@destroy');
        Route::get('addresses', Spot\Http\Controllers\Api\AddressesController::class . '@index');
        Route::post('addresses', Spot\Http\Controllers\Api\AddressesController::class . '@store');

        # places
        Route::get('places/{id}', Spot\Http\Controllers\Api\PlacesController::class . '@show');
        Route::put('places/{id}', Spot\Http\Controllers\Api\PlacesController::class . '@update');
        Route::delete('places/{id}', Spot\Http\Controllers\Api\PlacesController::class . '@destroy');
        Route::get('places', Spot\Http\Controllers\Api\PlacesController::class . '@index');
        Route::post('places', Spot\Http\Controllers\Api\PlacesController::class . '@store');
    }
);
