<?php

namespace Belt\Spot\Events;

use Belt\Spot\Place;
use Illuminate\Queue\SerializesModels;

/**
 * Class PlaceCreated
 * @package Belt\Spot\Events
 */
class PlaceCreated
{
    use SerializesModels;

    public $place;

    /**
     * Create a new event instance.
     *
     * @param  Place $place
     */
    public function __construct(Place $place)
    {
        $this->place = $place;
    }

}