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
     * @covers \Belt\Spot\Amenity::scopeAmenitied
     * @covers \Belt\Spot\Amenity::scopeNotAmenitied
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

        # scopeAmenitied
        $qbMock = m::mock(Builder::class);
        $qbMock->shouldReceive('select')->once()->with(['amenities.*']);
        $qbMock->shouldReceive('join')->once()->with('amenity_spots', 'amenity_spots.amenity_id', '=', 'amenities.id');
        $qbMock->shouldReceive('where')->once()->with('amenity_spots.owner_type', 'places');
        $qbMock->shouldReceive('where')->once()->with('amenity_spots.owner_id', 1);
        $amenity->scopeAmenitied($qbMock, 'places', 1);

        # scopeNotAmenitied
        $qbMock = m::mock(Builder::class);
        $qbMock->shouldReceive('select')->once()->with(['amenities.*']);
        $qbMock->shouldReceive('leftJoin')->once()->with('amenity_spots',
            m::on(function (\Closure $closure) {
                $subQBMock = m::mock(Builder::class);
                $subQBMock->shouldReceive('on')->once()->with('amenity_spots.amenity_id', '=', 'amenities.id');
                $subQBMock->shouldReceive('where')->once()->with('amenity_spots.owner_type', 'places');
                $subQBMock->shouldReceive('where')->once()->with('amenity_spots.owner_id', 1);
                $closure($subQBMock);
                return is_callable($closure);
            })
        );
        $qbMock->shouldReceive('whereNull')->once()->with('amenity_spots.id');
        $amenity->scopeNotAmenitied($qbMock, 'places', 1);

    }

}