<?php

use Mockery as m;

use Belt\Core\Testing\BeltTestCase;
use Belt\Spot\Location;
use Belt\Spot\Commands\GeoCoderCommand;
use Belt\Spot\Services\GeoCoders\GoogleMapsGeoCoder;

class GeoCoderCommandTest extends BeltTestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Commands\GeoCoderCommand::handle
     */
    public function testHandle()
    {

        $cmd = m::mock(GeoCoderCommand::class . '[option, info]');
        $cmd->shouldReceive('option')->with('location')->andReturn('123 Some St.');
        $cmd->shouldReceive('info')->andReturn(null);

        # handle
        Location::unguard();
        $location = factory(Location::class)->make();
        $service = m::mock(GoogleMapsGeoCoder::class . '[geocode]');
        $service->result = [];
        $service->location = $location;
        $service->shouldReceive('geocode')->once()->andReturn(null);
        $cmd->geocoder = $service;
        $cmd->handle();
    }

}
