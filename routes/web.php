<?php

use Belt\Spot\Http\Controllers\Web;

Route::group(['middleware' => ['web']], function () {

    if (config('belt.core.translate.prefix-urls')) {
        foreach ((array) config('belt.core.translate.locales') as $locale) {
            $code = array_get($locale, 'code');
            Route::get("$code/deals/{deal}/{slug?}", Web\DealsController::class . '@show');
            Route::get("$code/events/{event}/{slug?}", Web\EventsController::class . '@show');
            Route::get("$code/places/{place}/{slug?}", Web\PlacesController::class . '@show');
        }
    }

    Route::get('deals/{deal}/{slug?}', Web\DealsController::class . '@show');
    Route::get('events/{event}/{slug?}', Web\EventsController::class . '@show');
    Route::get('places/{place}/{slug?}', Web\PlacesController::class . '@show');

});