<?php

use Ohio\Spot\Address;

/**
 * API
 */
Route::group([
    'prefix' => 'api/v1',
    'middleware' => ['ohio.api']
],
    function () {
        Route::get('addresses/{id}', Address\Http\Controllers\Api\AddressesController::class . '@show');
        Route::put('addresses/{id}', Address\Http\Controllers\Api\AddressesController::class . '@update');
        Route::delete('addresses/{id}', Address\Http\Controllers\Api\AddressesController::class . '@destroy');
        Route::get('addresses', Address\Http\Controllers\Api\AddressesController::class . '@index');
        Route::post('addresses', Address\Http\Controllers\Api\AddressesController::class . '@store');
    }
);