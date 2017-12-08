<?php

namespace Belt\Spot\Listeners;

use Belt, Illuminate;
use Belt\Spot\Events;
use Belt\Spot\Listeners;

/**
 * Class PlaceEventSubscriber
 * @package Belt\Spot\Listeners
 */
class PlaceEventSubscriber
{
    /**
     * Register the listeners for the subscriber.
     *
     * @param Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        //$events->listen(Events\PlaceCreated::class, Listeners\SendPlaceWelcomeEmail::class);
    }

}