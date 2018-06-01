<?php

use Belt\Spot\Http\Controllers\Web;

Route::group(['middleware' => ['web']], function () {

    # deals
    Route::get('deals/{deal}/{slug?}', Web\PlacesController::class . '@show');
    
    # events
    Route::get('events/{event}/{slug?}', Web\EventsController::class . '@show');

    # places
    Route::get('places/{place}/{slug?}', Web\PlacesController::class . '@show');

});