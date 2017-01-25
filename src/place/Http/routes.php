<?php

use Ohio\Spot\Place;

/**
 * API
 */
Route::group([
    'prefix' => 'api/v1',
    'middleware' => ['ohio.api']
],
    function () {
        Route::get('places/{id}', Place\Http\Controllers\Api\PlacesController::class . '@show');
        Route::put('places/{id}', Place\Http\Controllers\Api\PlacesController::class . '@update')->middleware('ohio.api.admin');
        Route::delete('places/{id}', Place\Http\Controllers\Api\PlacesController::class . '@destroy')->middleware('ohio.api.admin');
        Route::get('places', Place\Http\Controllers\Api\PlacesController::class . '@index');
        Route::post('places', Place\Http\Controllers\Api\PlacesController::class . '@store')->middleware('ohio.api.admin');
    }
);