<?php

namespace Belt\Spot\Listeners;

use Belt, Illuminate;
use Belt\Spot\Events;
use Belt\Spot\Listeners;

/**
 * Class DealEventSubscriber
 * @package Belt\Spot\Listeners
 */
class DealEventSubscriber
{
    /**
     * Register the listeners for the subscriber.
     *
     * @param Illuminate\Events\Dispatcher $events
     */
    public function subscribe($events)
    {
        //$events->listen(Events\DealCreated::class, Listeners\SendDealWelcomeEmail::class);
    }

}