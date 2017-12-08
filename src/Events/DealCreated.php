<?php

namespace Belt\Spot\Events;

use Belt\Spot\Deal;
use Illuminate\Queue\SerializesModels;

/**
 * Class DealCreated
 * @package Belt\Spot\Events
 */
class DealCreated
{
    use SerializesModels;

    public $deal;

    /**
     * Create a new event instance.
     *
     * @param  Deal $deal
     */
    public function __construct(Deal $deal)
    {
        $this->deal = $deal;
    }

}