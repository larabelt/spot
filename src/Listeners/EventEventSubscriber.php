<?php

namespace Belt\Spot\Listeners;

use Belt, Illuminate;
use Belt\Spot\Events;
use Belt\Spot\Listeners;

/**
 * Class EventEventSubscriber
 * @package Belt\Spot\Listeners
 */
class EventEventSubscriber
{
    /**
     * Register the listeners for the subscriber.
     *
     * @param Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        //$events->listen(Events\EventCreated::class, Listeners\SendEventWelcomeEmail::class);
    }

}