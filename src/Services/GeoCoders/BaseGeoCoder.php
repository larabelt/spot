<?php
namespace Belt\Spot\Services\GeoCoders;

use Belt\Spot\Address;
use GuzzleHttp;

abstract class BaseGeoCoder
{
    /**
     * @var Address
     */
    public $address;

    /**
     * @var GuzzleHttp\Client
     */
    public $guzzle;

    /**
     * @var array
     */
    public $result = [];

    /**
     * @return GuzzleHttp\Client
     */
    public function guzzle()
    {
        return $this->guzzle ?: $this->guzzle = new GuzzleHttp\Client();
    }

    abstract function geocode($address);

}