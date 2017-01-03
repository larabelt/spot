<?php

use Ohio\Spot\Place;

/**
 * API
 */
Route::group([
    'prefix' => 'api/v1',
    'middleware' => ['api']
],
    function () {
        Route::get('places/{id}', Place\Http\Controllers\Api\PlacesController::class . '@show');
        Route::put('places/{id}', Place\Http\Controllers\Api\PlacesController::class . '@update');
        Route::delete('places/{id}', Place\Http\Controllers\Api\PlacesController::class . '@destroy');
        Route::get('places', Place\Http\Controllers\Api\PlacesController::class . '@index');
        Route::post('places', Place\Http\Controllers\Api\PlacesController::class . '@store');

        Route::group(['prefix' => 'placegables/{placegable_type}/{placegable_id}'], function () {
            Route::get('{id}', Place\Http\Controllers\Api\PlacegablesController::class . '@show');
            Route::delete('{id}', Place\Http\Controllers\Api\PlacegablesController::class . '@destroy');
            Route::get('', Place\Http\Controllers\Api\PlacegablesController::class . '@index');
            Route::post('', Place\Http\Controllers\Api\PlacegablesController::class . '@store');
        });
    }
);