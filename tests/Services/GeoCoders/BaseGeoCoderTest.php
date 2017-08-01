<?php

use Belt\Spot\Address;
use Belt\Spot\Services\GeoCoders\GoogleMapsGeoCoder;
use GuzzleHttp\Client;
use Belt\Core\Testing\BeltTestCase;

class BaseGeoCoderTest extends BeltTestCase
{

    /**
     * @covers \Belt\Spot\Services\GeoCoders\BaseGeoCoder::guzzle
     * @covers \Belt\Spot\Services\GeoCoders\BaseGeoCoder::reset
     * @covers \Belt\Spot\Services\GeoCoders\BaseGeoCoder::result
     * @covers \Belt\Spot\Services\GeoCoders\BaseGeoCoder::address
     */
    public function test()
    {
        $address = factory(Address::class)->make();
        $result = ['foo'];

        $service = new GoogleMapsGeoCoder();
        $service->address = $address;
        $service->result = $result;

        # guzzle
        $this->assertInstanceOf(Client::class, $service->guzzle());

        # result
        $this->assertEquals($result, $service->result());

        # address
        $this->assertEquals($address->toArray(), $service->address());

        # result
        $service->reset();
        $this->assertEquals([], $service->result());
    }

}