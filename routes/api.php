<?php

use Belt\Spot\Http\Controllers\Api;

Route::group([
    'prefix' => 'api/v1',
    'middleware' => ['api']
],
    function () {

        # locations
        Route::group([
            'prefix' => '{locatable_type}/{locatable_id}/locations',
            'middleware' => 'request.injections:locatable_type,locatable_id'
        ], function () {
            Route::get('{location}', Api\LocationsController::class . '@show');
            Route::put('{location}', Api\LocationsController::class . '@update');
            Route::delete('{location}', Api\LocationsController::class . '@destroy');
            Route::get('', Api\LocationsController::class . '@index');
            Route::post('', Api\LocationsController::class . '@store');
        });

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

        # deals
        Route::get('deals/{id}', Api\DealsController::class . '@show');
        Route::put('deals/{id}', Api\DealsController::class . '@update');
        Route::delete('deals/{id}', Api\DealsController::class . '@destroy');
        Route::get('deals', Api\DealsController::class . '@index');
        Route::post('deals', Api\DealsController::class . '@store');

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
