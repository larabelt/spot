<?php

use Mockery as m;
use Belt\Core\Testing\BeltTestCase;
use Belt\Spot\Amenity;
use Illuminate\Database\Eloquent\Builder;

class AmenityTest extends BeltTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Amenity::__toString
     * @covers \Belt\Spot\Amenity::setBodyAttribute
     * @covers \Belt\Spot\Amenity::scopeAmenityged
     * @covers \Belt\Spot\Amenity::scopeNotAmenityged
     */
    public function test()
    {
        $amenity = factory(Amenity::class)->make();

        # __toString
        $amenity->name = ' Test ';
        $this->assertEquals($amenity->name, $amenity->__toString());

        # setBodyAttribute
        $amenity->body = ' Test ';
        $this->assertEquals('Test', $amenity->body);

    }

}