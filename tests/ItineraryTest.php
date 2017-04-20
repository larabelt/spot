<?php
use Mockery as m;

use Belt\Core\Testing\BeltTestCase;
use Belt\Spot\Itinerary;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ItineraryTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Itinerary::places
     * @covers \Belt\Spot\Itinerary::itineraryPlaces
     */
    public function test()
    {
        $itinerary = new Itinerary();

        # places
        $this->assertInstanceOf(HasMany::class, $itinerary->places());

        # itineraryPlaces
        $this->assertInstanceOf(HasMany::class, $itinerary->itineraryPlaces());
    }

}