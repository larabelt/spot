<?php

use Belt\Spot;

Route::group([
    'prefix' => 'api/v1',
    'middleware' => ['api']
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
