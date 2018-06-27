<?php

namespace Belt\Spot\Services\GeoCoders;

use Belt\Spot\Location;
use GuzzleHttp;

/**
 * Class BaseGeoCoder
 * @package Belt\Spot\Services\GeoCoders
 */
abstract class BaseGeoCoder
{
    /**
     * @var Location
     */
    public $location;

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

    /**
     * @param $location
     * @return mixed
     */
    abstract function geocode($location);

    /**
     * Reset
     */
    public function reset()
    {
        $this->location = new Location();
        $this->result = [];
    }

    /**
     * @return array
     */
    public function result()
    {
        return $this->result ?: [];
    }

    /**
     * @return array
     */
    public function location()
    {
        $location = $this->location ?: new Location();

        return $location->toArray();
    }

}