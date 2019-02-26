<?php namespace Tests\Belt\Spot\Unit;

use Tests\Belt\Core\BeltTestCase;
use Belt\Spot\Place;
use Belt\Spot\Location;

class LocationTest extends BeltTestCase
{
    /**
     * @covers \Belt\Spot\Location::__toString
     * @covers \Belt\Spot\Location::locatable
     * @covers \Belt\Spot\Location::setGeoServiceAttribute
     * @covers \Belt\Spot\Location::setGeoCodeAttribute
     */
    public function test()
    {

        Place::unguard();
        $place = factory(Place::class)->make();
        $place->id = 1;

        Location::unguard();
        $location = factory(Location::class)->make();
        $location->id = 2;
        $location->locatable_id = 1;
        $location->locatable_type = $place->getMorphClass();
        $location->geo_service = ' test ';
        $location->geo_code = ' test ';
        $location->delta = 1;
        $location->locatable()->add($place);

        $attributes = $location->getAttributes();

        # setters
        $this->assertEquals(2, $location->__toString());
        $this->assertEquals('test', $attributes['geo_service']);
        $this->assertEquals('test', $attributes['geo_code']);
        $this->assertEquals('places', $attributes['locatable_type']);
    }

}