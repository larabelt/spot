<?php

use Belt\Spot\Http\Controllers\Api;

Route::group([
    'prefix' => 'api/v1',
    'middleware' => ['api']
],
    function () {

        # addresses
        Route::get('addresses/{id}', Api\AddressesController::class . '@show');
        Route::put('addresses/{id}', Api\AddressesController::class . '@update');
        Route::delete('addresses/{id}', Api\AddressesController::class . '@destroy');
        Route::get('addresses', Api\AddressesController::class . '@index');
        Route::post('addresses', Api\AddressesController::class . '@store');

        # amenities
        Route::get('amenities/{amenity}', Api\AmenitiesController::class . '@show');
        Route::put('amenities/{amenity}', Api\AmenitiesController::class . '@update');
        Route::delete('amenities/{amenity}', Api\AmenitiesController::class . '@destroy');
        Route::get('amenities', Api\AmenitiesController::class . '@index');
        Route::post('amenities', Api\AmenitiesController::class . '@store');

        # amenity_spots
        Route::group([
            'prefix' => '{owner_type}/{owner_id}/amenities',
            'middleware' => 'request.injections:owner_type,owner_id'
        ], function () {
            Route::get('{id}', Api\AmenitySpotsController::class . '@show');
            Route::put('{id}', Api\AmenitySpotsController::class . '@update');
            Route::delete('{id}', Api\AmenitySpotsController::class . '@destroy');
            Route::get('', Api\AmenitySpotsController::class . '@index');
            Route::post('', Api\AmenitySpotsController::class . '@store');
        });

        # events
        Route::get('events/{id}', Api\EventsController::class . '@show');
        Route::put('events/{id}', Api\EventsController::class . '@update');
        Route::delete('events/{id}', Api\EventsController::class . '@destroy');
        Route::get('events', Api\EventsController::class . '@index');
        Route::post('events', Api\EventsController::class . '@store');

        # places
        Route::get('places/{id}', Api\PlacesController::class . '@show');
        Route::put('places/{id}', Api\PlacesController::class . '@update');
        Route::delete('places/{id}', Api\PlacesController::class . '@destroy');
        Route::get('places', Api\PlacesController::class . '@index');
        Route::post('places', Api\PlacesController::class . '@store');
    }
);
