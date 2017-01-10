<?php

use Mockery as m;

use Ohio\Core\Base\Testing\OhioTestCase;
use Ohio\Spot\Address\Address;
use Ohio\Spot\Base\Commands\GeoCoderCommand;
use Ohio\Spot\Base\Services\GeoCoders\GoogleMapsGeoCoder;

class GeoCoderCommandTest extends OhioTestCase
{

    public function tearDown()
    {
        m::close();
    }

    /**
     * @covers \Ohio\Spot\Base\Commands\GeoCoderCommand::getService
     * @covers \Ohio\Spot\Base\Commands\GeoCoderCommand::handle
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
