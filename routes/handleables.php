<?php

use Belt\Spot\Http\Controllers\Web;

# places
Response::macro('places', function ($place) {

    $controller = app()->make(Web\PlacesController::class);
    $response = $controller->callAction('show', ['place' => $place]);

    return Response::make($response);
});

# events
Response::macro('events', function ($event) {

    $controller = app()->make(Web\EventsController::class);
    $response = $controller->callAction('show', ['event' => $event]);

    return Response::make($response);
});