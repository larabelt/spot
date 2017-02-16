<?php

use Mockery as m;

use Belt\Core\Testing\BeltTestCase;
use Belt\Spot\Address;
use Belt\Spot\Commands\GeoCoderCommand;
use Belt\Spot\Services\GeoCoders\GoogleMapsGeoCoder;

class GeoCoderCommandTest extends BeltTestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Belt\Spot\Commands\GeoCoderCommand::getService
     * @covers \Belt\Spot\Commands\GeoCoderCommand::handle
     */
    public function testHandle()
    {

        $cmd = m::mock(GeoCoderCommand::class . '[option, info]');
        $cmd->shouldReceive('option')->with('address')->andReturn('123 Some St.');
        $cmd->shouldReceive('info')->andReturn(null);

        # service
        $this->assertInstanceOf(GoogleMapsGeoCoder::class, $cmd->getService());

        # handle
        Address::unguard();
        $address = factory(Address::class)->make();
        $service = m::mock(GoogleMapsGeoCoder::class);
        $service->result = [];
        $service->address = $address;
        $service->shouldReceive('geocode')->once()->andReturn(null);
        $cmd->service = $service;
        $cmd->handle();
    }

}
