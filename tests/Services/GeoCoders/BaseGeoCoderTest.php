<?php

use Belt\Spot\Location;
use Belt\Spot\Services\GeoCoders\GoogleMapsGeoCoder;
use GuzzleHttp\Client;
use Belt\Core\Testing\BeltTestCase;

class BaseGeoCoderTest extends BeltTestCase
{

    /**
     * @covers \Belt\Spot\Services\GeoCoders\BaseGeoCoder::guzzle
     * @covers \Belt\Spot\Services\GeoCoders\BaseGeoCoder::reset
     * @covers \Belt\Spot\Services\GeoCoders\BaseGeoCoder::result
     * @covers \Belt\Spot\Services\GeoCoders\BaseGeoCoder::location
     */
    public function test()
    {
        $location = factory(Location::class)->make();
        $result = ['foo'];

        $service = new GoogleMapsGeoCoder();
        $service->location = $location;
        $service->result = $result;

        # guzzle
        $this->assertInstanceOf(Client::class, $service->guzzle());

        # result
        $this->assertEquals($result, $service->result());

        # location
        $this->assertEquals($location->toArray(), $service->location());

        # result
        $service->reset();
        $this->assertEquals([], $service->result());
    }

}