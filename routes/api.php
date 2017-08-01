<?php

use Belt\Spot\Http\Controllers\Api;

Route::group([
    'prefix' => 'api/v1',
    'middleware' => ['api']
],
    function () {

        # addresses
        Route::group([
            'prefix' => '{addressable_type}/{addressable_id}/addresses',
            'middleware' => 'request.injections:addressable_type,addressable_id'
        ], function () {
            Route::get('{address}', Api\AddressesController::class . '@show');
            Route::put('{address}', Api\AddressesController::class . '@update');
            Route::delete('{address}', Api\AddressesController::class . '@destroy');
            Route::get('', Api\AddressesController::class . '@index');
            Route::post('', Api\AddressesController::class . '@store');
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

        # itinerary/places
        Route::group([
            'prefix' => 'itineraries/{itinerary}/places',
        ], function () {
            Route::get('{id}', Api\ItineraryPlacesController::class . '@show');
            Route::put('{id}', Api\ItineraryPlacesController::class . '@update');
            Route::delete('{id}', Api\ItineraryPlacesController::class . '@destroy');
            Route::get('', Api\ItineraryPlacesController::class . '@index');
            Route::post('', Api\ItineraryPlacesController::class . '@store');
        });

        # itineraries
        Route::get('itineraries/{itinerary}', Api\ItinerariesController::class . '@show');
        Route::put('itineraries/{itinerary}', Api\ItinerariesController::class . '@update');
        Route::delete('itineraries/{itinerary}', Api\ItinerariesController::class . '@destroy');
        Route::get('itineraries', Api\ItinerariesController::class . '@index');
        Route::post('itineraries', Api\ItinerariesController::class . '@store');

        # places
        Route::get('places/{id}', Api\PlacesController::class . '@show');
        Route::put('places/{id}', Api\PlacesController::class . '@update');
        Route::delete('places/{id}', Api\PlacesController::class . '@destroy');
        Route::get('places', Api\PlacesController::class . '@index');
        Route::post('places', Api\PlacesController::class . '@store');
    }
);
