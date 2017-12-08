<?php

namespace Belt\Spot\Events;

use Belt\Spot\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Class EventCreated
 * @package Belt\Spot\Events
 */
class EventCreated
{
    use SerializesModels;

    public $event;

    /**
     * Create a new event instance.
     *
     * @param  Event $event
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

}