<?php
use Mockery as m;

use Belt\Core\Testing\BeltTestCase;
use Belt\Spot\Address;
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
        $place->address = factory(Address::class)->make();

        # is searchable
        $place->setIsSearchableAttribute(' true!!! ');
        $this->assertEquals(true, $place->is_searchable);

        # toSearchableArray
        $this->assertNotEmpty($place->toSearchableArray());

    }

}