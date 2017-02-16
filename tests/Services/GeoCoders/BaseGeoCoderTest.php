<?php

use Belt\Spot\Services\GeoCoders\GoogleMapsGeoCoder;
use GuzzleHttp\Client;

class BaseGeoCoderTest extends PHPUnit_Framework_TestCase
{

    /**
     * @covers \Belt\Spot\Services\GeoCoders\BaseGeoCoder::guzzle
     */
    public function test()
    {
        $service = new GoogleMapsGeoCoder();
        $this->assertInstanceOf(Client::class, $service->guzzle());
    }

}