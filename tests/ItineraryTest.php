<?php
use Mockery as m;

use Belt\Core\Testing\BeltTestCase;
use Belt\Spot\Itinerary;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItineraryTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     */
    public function test()
    {
        $itinerary = new Itinerary();
    }

}