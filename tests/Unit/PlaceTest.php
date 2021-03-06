<?php namespace Tests\Belt\Spot\Unit;
use Mockery as m;

use Belt\Core\Tests\BeltTestCase;
use Belt\Spot\Location;
use Belt\Spot\Place;

class PlaceTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Place::setIsSearchableAttribute
     * @covers \Belt\Spot\Place::toSearchableArray
     */
    public function test()
    {
        $place = factory(Place::class)->make();
        $place->location = factory(Location::class)->make();

        # is searchable
        $place->setIsSearchableAttribute(' true!!! ');
        $this->assertEquals(true, $place->is_searchable);

        # toSearchableArray
        $this->assertNotEmpty($place->toSearchableArray());

    }

}