<?php
use Mockery as m;

use Ohio\Core\Base\Testing\OhioTestCase;
use Ohio\Spot\Place\Place;
use Illuminate\Database\Eloquent\Builder;

class PlaceTest extends OhioTestCase
{
    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Ohio\Spot\Place\Place::__toString
     * @covers \Ohio\Spot\Place\Place::setBodyAttribute
     * @covers \Ohio\Spot\Place\Place::scopePlaceged
     * @covers \Ohio\Spot\Place\Place::scopeNotPlaceged
     */
    public function test()
    {
        $place = factory(Place::class)->make();

        # __toString
        $place->name = ' Test ';
        $this->assertEquals($place->name, $place->__toString());

        # setBodyAttribute
        $place->body = ' Test ';
        $this->assertEquals('Test', $place->body);

        # scopePlaceged
        $qbMock = m::mock(Builder::class);
        $qbMock->shouldReceive('select')->once()->with(['places.*']);
        $qbMock->shouldReceive('join')->once()->with('placegables', 'placegables.place_id', '=', 'places.id');
        $qbMock->shouldReceive('where')->once()->with('placegables.placegable_type', 'pages');
        $qbMock->shouldReceive('where')->once()->with('placegables.placegable_id', 1);
        $place->scopePlaceged($qbMock, 'pages', 1);

        # scopeNotPlaceged
        $qbMock = m::mock(Builder::class);
        $qbMock->shouldReceive('select')->once()->with(['places.*']);
        $qbMock->shouldReceive('leftJoin')->once()->with('placegables',
            m::on(function (\Closure $closure) {
                $subQBMock = m::mock(Builder::class);
                $subQBMock->shouldReceive('on')->once()->with('placegables.place_id', '=', 'places.id');
                $subQBMock->shouldReceive('where')->once()->with('placegables.placegable_type', 'pages');
                $subQBMock->shouldReceive('where')->once()->with('placegables.placegable_id', 1);
                $closure($subQBMock);
                return is_callable($closure);
            })
        );
        $qbMock->shouldReceive('whereNull')->once()->with('placegables.id');
        $place->scopeNotPlaceged($qbMock, 'pages', 1);

    }

}